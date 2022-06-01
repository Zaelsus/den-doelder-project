<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::all();
        return view('machines.index', compact('machines'));
    }

    /**
     * changes the "selected" status of the current order to selected
     */
    public static function selectMachine(Machine $machine, User $user)
    {
        $user->update(['machine_id' => $machine->id]);
        return redirect(route('machines.show',compact('machine')));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        //will get the status of the production
        $productionStatus = Order::isInProduction($machine);
        //all the orders currently
        $orders = Order::where('machine', $machine->name)->orderBy('start_date', 'desc')->get();
        //checks the role and loads the correct view
        if (Auth::user()->role === 'Production') {
            // if there isnt any order in production
            if ($productionStatus === 'no production') {
                return view('orders.index', compact('orders'));
            }
            // if there is production whether its producing or paused
            if ($productionStatus === 'In Production') {
                $order = Order::where('status', 'In Production')->first();
            } else {
                $order = Order::where('status', 'Paused')->first();
            }
            return view('orders.show', compact('order'));
        }

        return view('orders.index', compact('orders'));
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machine $machine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        //
    }
}
