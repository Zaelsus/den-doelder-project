<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Order;
use App\Http\Requests\StoreTruckRequest;
use App\Http\Requests\UpdateTruckRequest;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('delivery_status', 'pending')->oldest()->get();
        return view('truck.todo.index', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

//        dd($order);
        return view('truck.todo.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $trucks = Truck::all();
//        dd($trucks);
        return view('truck.edit', compact('order', 'trucks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update( Order $order)
    {
        $order->update(request()->validate([
            'delivery_status'=> ['required'],
        ]));

        return redirect(route('todo.index'));
    }

}
