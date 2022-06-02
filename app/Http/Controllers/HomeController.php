<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard according to status of production.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        //will get the status of the production
//        $productionStatus = Order::isInProduction();
//        $selectedOrder = Order::isSelected();
//        //all the orders currently
//        $orders = Order::orderBy('start_date', 'desc')->paginate(10);
//        //checks the role and loads the correct view
//        if (Auth::user()->role === 'Production') {
//            // if there isnt any order in production
//            if ($productionStatus === 'no production') {
//                return view('orders.index', compact('orders'));
//            }
//            // if there is production whether its producing or paused
//            if ($productionStatus === 'In Production') {
//                $order = Order::where('status', 'In Production')->first();
//            } else {
//                $order = Order::where('status', 'Paused')->first();
//            }
//            return view('orders.show', compact('order'));
//        }
//        //administration view
//        elseif($selectedOrder !== null) {
//            $order=$selectedOrder;
//            return view('orders.show', compact('order'));
//        }
//        return view('orders.index', compact('orders'));

    }
}
