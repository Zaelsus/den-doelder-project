<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Order;
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

        /** loop through the notes to see if the priority should be updated.
            if there is an error note without a fix note, the priority is high.
            if there is an error note with a fixe note, the priority goes to low again.*/
        foreach($notes as $note) {
            if($note->fix === 'Error!') {
                $note->update(['priority' => 'high']);
            }
            if($note->note_rel !== null) {
                Note::where('id', $note->note_rel)->update(['priority' => 'low']);
            }
        }

        //different index pages for different roles; admin sees all notes
        if(Auth::user()->role === 'Administrator') {
            $notes = Note::orderBy('created_at', 'desc')->get();
        } else if(Auth::user()->role === 'Production') {
            //production sees notes that are made by production and only for this order
            $notes = Note::where('order_id', $order->id)->where('creator', 'Production')->orderBy('priority', 'asc')->orderBy('created_at', 'desc')->get();
        } else {
            //truck driver sees notes that are made by truck drivers and only for this order
            $notes = Note::where('order_id', $order->id)->where('creator', 'Driver');
        }

        //go to index blade and send the notes that came out of the if-statement as well as the order found earlier
        return view('notes.index', compact('notes', 'order'));
    }

//    /**
//     * Show the form for creating a new note.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        $order = $this->findOrderForUser();
//
//        return view('notes.create', compact('order'));
//    }

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

        //if it comes from fixStoppage, get the error note related to the fix
        $note_rel = $request->input('note_rel');

        if($label === 'Material Issue (Error)' || $label === 'Mechanical Issue (Error)' || $label === 'Technical Issue (Error)') {
            $fix = false;
        } else {
            $fix = true;
        }

        $order = $this->findOrderForUser();

        $note = Note::create($this->validateNote($request, $order->id, $fix, $note_rel));

        if(($order->status === 'In Production') && (substr($note->label, -7) === '(Error)')) {
            $order->update(['status' => 'Paused']);
        } else if(($order->status === 'Paused') && ($note->label === 'Fix')) {
            dd('no hello');
        }


        if($note->label === 'End of Shift') {
            return redirect(route('orders.editquantity', $order));
        }

//      redirecting to show the note
        return redirect(route('notes.index', $note));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
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
        $order_id = $note->order_id;
        $note->update($this->validateNote($request, $order_id));

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
        }


    }

    public function getOrder() {
        $machine = Auth::user()->machine;

        if(Order::isInProduction($machine) ==='In Production'){
            $order = Order::where('status','In Production')->first();
        }elseif(Order::isInProduction($machine) ==='Paused') {
            $order = Order::where('status','Paused')->first();
        }

        return $order;
    }

    public function findOrderForUser() {
        if(Auth::user()->role === 'Administrator') {
            $order = Order::isSelected();
        } else
            $order = $this->getOrder();

        return $order;
    }

    /**
     * this function validates the attributes of a note
     * @param Request $request
     * @return array
     */
    public function validateNote(Request $request, $order_id, $fix, $note_rel): array
    {

        $validatedAttributes = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'label'=>'required',
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
