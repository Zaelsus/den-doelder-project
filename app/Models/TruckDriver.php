<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TruckDriver extends Model
{
    use HasFactory;

    /**
     * returns if there is an order selected (for truck driver view)
     */
    public static function isSelected()
    {
        $orderSelected = Order::where('active_driver', 1)->first();
        if ($orderSelected !== null) {
            return $orderSelected;
        }
        return null;
    }

    public static function findDriverOrder()
    {
        $machine = Auth::user()->machine;
        $order = $machine->orders->where('truckDriver_status', 'Driving')->first();

        if($order === null){
            return null;
        }
        return $order;
    }
}
