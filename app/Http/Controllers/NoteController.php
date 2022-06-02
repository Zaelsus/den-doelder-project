<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Order;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = '', $machine = '')
    {
        if(Order::isInProduction() ==='In Production'){
            $order = Order::where('status','In Production')->first();
        }elseif(Order::isInProduction() ==='Paused') {
            $order = Order::where('status','Paused')->first();
        }

        $notes = Note::orderBy('created_at', 'desc')->get();

        return view('notes.index', ['notes' => $notes], ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Order::isInProduction() ==='In Production'){
            $order = Order::where('status','In Production')->first();
        }elseif(Order::isInProduction() ==='Paused') {
            $order = Order::where('status','Paused')->first();
        }
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
        if(Order::isInProduction() ==='In Production'){
            $order = Order::where('status','In Production')->first();
        }elseif(Order::isInProduction() ==='Paused') {
            $order = Order::where('status','Paused')->first();
        }

        $note = Note::create($this->validateNote($request, $order));

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
        $note->update($this->validateNote($request));

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
     * this function validates the attributes of a note
     * @param Request $request
     * @return array
     */
    public function validateNote(Request $request, $order): array
    {
        $validatedAttributes = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'label'=>'required',
            'priority'=>'required'
        ]);
        $validatedAttributes['order_id'] = $order->id;

        return $validatedAttributes;
    }
}
