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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = $this->findOrderForUser();

        $notes = Note::orderBy('created_at', 'desc')->get();

        return view('notes.index', compact('notes', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = $this->findOrderForUser();

        return view('notes.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_id = $this->findOrderForUser()->id;

        $note = Note::create($this->validateNote($request, $order_id));

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
//        $orders = Order::all();
//        return view('notes.edit', compact('orders', 'note'));
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
    public function fixStoppage(Note $note) {
        $order_id = $note->order->order_number;
        return view('notes.fixStoppage', compact('order_id', 'note'));
    }

    public function getOrder() {
        $machine = Auth::user()->machine;
        if(Auth::user()->role === 'Driver') {
            $order = TruckDriver::findDriverOrder();
        } else {
            if (Order::isInProduction($machine) === 'In Production') {
                $order = Order::where('status', 'In Production')->first();
            } elseif (Order::isInProduction($machine) === 'Paused') {
                $order = Order::where('status', 'Paused')->first();
            }
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
    public function validateNote(Request $request, $order_id): array
    {

        $validatedAttributes = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'label'=>'',
            'priority'=>'',
            'fix'=>''
        ]);
        $validatedAttributes['order_id'] = $order_id;

        return $validatedAttributes;
    }
}
