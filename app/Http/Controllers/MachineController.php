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
     * Display the index page for the machines (machine choice)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::where('name','!=','None')->get();
        return view('machines.index', compact('machines'));
    }

    /**
     * changes the machine for each user according to what they picked
     */
    public static function selectMachine(Machine $machine, User $user)
    {
        $user->update(['machine_id' => $machine->id]);
        return redirect(route('machines.show', compact('machine')));
    }


    /**
     * Display the specified resource.
     * This show method is for the production role to see the correct orders
     * @param \App\Models\Machine $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        //will get the current order in production (or paused) or null if there isnt
        $order = Order::getOrder($machine);
        //checks the role and loads the correct view
        if (Auth::user()->role === 'Production') {
            $orders = Order::where('machine_id', $machine->id)
                ->where('status', 'Production Pending')
                ->orderBy('start_date', 'desc')->get();
            // if there isnt any order in production
            if ($order === null) {
                $previousMachine=null;
                return view('orders.index', compact('orders','previousMachine'));
            }
            return view('orders.show', compact('order'));

        }
        //can add here for truck drivers as well according to their conditions
    }

//not needed maybe remove
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Machine  $machine
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Machine $machine)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Machine  $machine
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Machine $machine)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Machine  $machine
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Machine $machine)
//    {
//        //
//    }
}
