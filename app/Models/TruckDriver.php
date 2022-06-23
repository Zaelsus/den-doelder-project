<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TruckDriver extends Model
{
    use HasFactory;

    /**
     * Get the current order which is in driving status for truck driver status or null if there isnt one
     * @param Machine $machine
     * @return null
     */
    public static function getDrivingOrder(Machine $machine)
    {
        $order = $machine->orders->where('truckDriver_status', 'Driving')->first();
        if($order === null){
            return null;
        }
        return $order;
    }
}
