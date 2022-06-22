<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Order;
use App\Models\TruckDriver;
use Illuminate\Http\Request;

class TruckDriverController extends Controller
{

    /**
     * This method will return a list of all orders for the current machine for truck drivers
     * @param \App\Models\Machine $machine
     * @return \Illuminate\Http\Response
     */
    public function list(Machine $machine)
    {
        $orders = Order::where('machine_id', $machine->id)
            ->where('status', '!=', 'Admin Hold')
            ->where(function ($query) {
                $query->where('truckDriver_status', '!=', 'Delivered')
                    ->orwhere('truckDriver_status', null);
            })
            ->orderBy('status', 'asc')
            ->orderBy('start_date', 'desc')->get();
        $previousMachine = null;
        return view('orders.index', compact('orders', 'previousMachine'));

    }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TruckDriver $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function show(TruckDriver $truckDriver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TruckDriver $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function edit(TruckDriver $truckDriver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TruckDriver $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TruckDriver $truckDriver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TruckDriver $truckDriver
     * @return \Illuminate\Http\Response
     */
    public function destroy(TruckDriver $truckDriver)
    {
        //
    }
}
