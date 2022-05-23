<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //looking about adding another order by accoridng to status as well as scheduled production
        $orders = Order::orderBy('start_date', 'desc')->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $groups = Group::all();
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($this->validateOrder($request));

        // redirecting to show a page
        return redirect(route('orders.show', compact('order')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
//        if($order->status === 'In Production' ||$order->status === 'Paused') {
//            return view('orders.show', compact('order'));
//        }
//        return view('orders.startShow', compact('order'));

    }

    /**
     * changes the status of the current order to in production
     */
    public static function startProduction(Order $order)
    {
        if($order->status ==='Pending') {
            $order->update(['status'=>'In Production','start_time'=> date('Y-m-d H:i:s')]);
        } else {
            $order->update(['status'=>'In Production']);
        }
        return redirect(route('orders.show', $order));

    }

    /**
     * changes the status of the current order to done
     */
    public static function stopProduction(Order $order)
    {
        $order->update(['status'=>'Done','end_time'=> date('Y-m-d H:i:s')]);
        return redirect(route('orders.index'));
    }

    /**
     * changes the status of the current order to done
     */
    public static function pauseProduction(Order $order)
    {
        $order->update(['status'=>'Paused']);
        return redirect(route('orders.show',$order));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($this->validateOrder($request));

        return redirect(route('orders.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('orders.index'));
    }

    /**
     * this function validates the attributes of Retro
     * @param Request $request
     * @return array
     */
    public function validateOrder(Request $request): array
    {
        $validatedAtributes = $request->validate([
            'order_id'=>'required',
            'customer_name'=>'required',
            'order_production_line'=>'required',
            'scheduled_production_date'=>'required|date',
            'pallet_type'=>'required',
            'quantity'=>'required|integer|min:0',
            'location'=>'required',
            'material'=>'required',
            'material_quantity'=>'required|integer',
        ]);

        return $validatedAtributes;
    }

    // status manipulation

}
