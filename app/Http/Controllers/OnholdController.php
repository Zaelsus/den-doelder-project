<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTruckRequest;
use App\Http\Requests\UpdateTruckRequest;
use App\Models\Order;
use App\Models\Truck;
use Illuminate\Http\Request;

class OnholdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('delivery_status', 'onhold')->oldest()->get();
        return view('truck.onhold.index', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
//        dd($todo);
        return view('truck.onhold.show', ['order' => $order]);
    }

}
