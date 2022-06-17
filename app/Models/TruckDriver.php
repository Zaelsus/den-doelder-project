<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
