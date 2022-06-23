<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Order;
use App\Models\TruckDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display an overview of a selection of notes, depending on the role
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //find current order selected
        $order = $this->findOrderForUser();

        //first get all the notes
        $notes = Note::all();

        //update priority of note, loop through the notes
        //to see if the priority should be updated
        foreach($notes as $note) {
            $note->updatePriority();
        }

        //different note collections for different roles, get the
        //right notes for the index page
        $notes = $this->getNotes($order);

        //go to index blade and send the notes that came out of the if-statement as well as the order found earlier
        return view('notes.index', compact('notes', 'order'));
    }

    /**
     * Show the form for creating a new note.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        The create function is not needed anymore, because we are using modals. The create note modal
//          goes directly to the store() method below
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get the checked label
        $label = $request->input('label');

        //set the fix
        $fix = $this->setFix($label);

        //if it comes from fixStoppage, get the error note related to the fix
        $note_rel = $request->input('note_rel');

        //find the order for the note
        $order = $this->findOrderForUser();

        //store the note with the attributes of the request, together with the set fix, note related and order id
        $note = Note::create($this->validateNote($request, $order->id, $fix, $note_rel));


        //Update the status of the order. If the status is in production and an error note is set in, the status is
        //updated to paused. If the status is paused and the note is a fix note, update the status to in production.
        if(($order->status === 'In Production') && (substr($note->label, -7) === '(Error)'
                || $note->label === 'Lunch Break' || $note->label === 'End of Shift' || $note->label === 'Cleaning')) {
            $order->update(['status' => 'Paused']);
        } else if(($order->status === 'Paused') && ($note->label === 'Fix')) {
            $order->update(['status' => 'In Production']);
        }

        //if the label is 'End of Shift', redirect to edit quantity, otherwise redirect to the index page of the note
        if($note->label === 'End of Shift') {
            return redirect(route('orders.editquantity', $order));
        }

        return redirect(route('notes.index', $note));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $orders = Order::all();
        return view('notes.edit', compact('orders', 'note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $fix = $this->setFix($note->label);

        //if it comes from fixStoppage, get the error note related to the fix
        $note_rel = $request->input('note_rel');
        $order_id = $note->order_id;
        $note->update($this->validateNote($request, $order_id, $fix, $note_rel));

        return redirect('/notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect(route('notes.index'));
    }

    /**
     * Returns the view of adding a new note for a stoppage
     *
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function stoppage(Order $order) {
        return view('notes.stoppage', compact('order'));
    }

    /**
     * Returns the view of adding a fix to a stoppage note
     *
     * @param Order $order
     *
     */
    public function fixStoppage(Order $order) {
        $note = Note::where('order_id', $order->id)->where('priority', 'high')->first();

        if($note === null) {
            if(Note::where('order_id', $order->id)->first()->label === 'End of Shift') {
                dd('change of shift');
            }
            return redirect(route('orders.show', $order));
        } else {
            return view('notes.fixStoppage', compact('order', 'note'));
//            return view('modals.logFix', compact('order', 'note'));
        }


    }

    public function getOrder() {
        $machine = Auth::user()->machine;
        if(Auth::user()->role === 'Driver') {
            $order = TruckDriver::getDrivingOrder($machine);
        } else {
           $order=Order::getOrder($machine);
        }
        return $order;
    }

    public function getNotes($order) {
        if(Auth::user()->role === 'Administrator') {
            //admin sees all notes
            $notes = Note::orderBy('created_at', 'desc')->get();
        } else if(Auth::user()->role === 'Production') {
            //production sees notes that are made by production and only for this order
            $notes = Note::where('order_id', $order->id)->where('creator', 'Production')->orderBy('priority', 'asc')->orderBy('created_at', 'desc')->get();
        } else {
            //truck driver sees notes that are made by truck drivers and only for this order
            $notes = Note::where('order_id', $order->id)->where('creator', 'Driver')->orderBy('created_at', 'desc')->get();
        }

        return $notes;
    }

    public function findOrderForUser() {
        if(Auth::user()->role === 'Administrator') {
            $order = Order::isSelected();
        } else
            $order = $this->getOrder();

        return $order;
    }

    /**
     * Set the fix attribute of the note, if it is an error note, set the fix to false
     * If it is not an error note, set the fix to true
     *
     * @param $label
     * @return bool
     */
    public function setFix($label): bool {
        if($label === 'Material Issue (Error)' || $label === 'Mechanical Issue (Error)' || $label === 'Technical Issue (Error)') {
            $fix = false;
        } else {
            $fix = true;
        }

        return $fix;
    }

    /**
     * this function validates the attributes of a note
     * @param Request $request
     * @return array
     */
    public function validateNote(Request $request, $order_id, $fix, $note_rel): array
    {
        $validatedAttributes = $request->validate([
            'title'=>'',
            'content'=>'',
            'fixContent'=>'',
            'label'=>'',
        ]);

        $validatedAttributes['order_id'] = $order_id;
        $validatedAttributes['note_rel'] = $note_rel;
        $validatedAttributes['priority'] = 'low';
        if($fix === false) {
            $validatedAttributes['fix'] = 'Error!';
        }

        if (Auth::user()->role === 'Administrator') {
            $validatedAttributes['creator'] = 'Administrator';
        } else if (Auth::user()->role === 'Production') {
            $validatedAttributes['creator'] = 'Production';
        } else {
            $validatedAttributes['creator'] = 'Driver';
        }

        return $validatedAttributes;
    }
}
