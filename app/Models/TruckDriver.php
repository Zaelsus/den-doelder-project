<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TruckDriver extends Model
{
    use HasFactory;

    public static function getDrivingOrder(Machine $machine)
    {
        $order = $machine->orders->where('truckDriver_status', 'Driving')->first();
        if($order === null){
            return null;
        }
        return $order;
    }
}
