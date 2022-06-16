<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TruckDriver;
use Illuminate\Http\Request;

class TruckDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TruckDriver  $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function show(TruckDriver $truckDriver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TruckDriver  $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function edit(TruckDriver $truckDriver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TruckDriver  $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TruckDriver $truckDriver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TruckDriver  $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function destroy(TruckDriver $truckDriver)
    {
        //
    }

    /**
     * changes the "selected" status of the current order to selected
     */
    public static function selectOrder(Order $order)
    {
        $order->update(['active_driver' => 1]);
        return redirect(route('orders.show', $order));
    }

    /**
     * changes the "selected" status of the current order to unselected
     */
    public static function unselectOrder(Order $order)
    {
        $order->update(['active_driver' => 0]);
        return redirect(route('orders.index'));
    }

}
