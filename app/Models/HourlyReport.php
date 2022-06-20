<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HourlyReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Gets the order related to the hourly report log
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Function to check the table row's Def ID value and return the appropriate
     * text response
     *
     * @param $def_id
     * @return string
     */
    public static function displayDefId($def_id)
    {
        if ($def_id == 1)
        {
            return 'Stable Stacked Pallets';
        } else if ($def_id == 2)
        {
            return 'Dust, Fungi & Quality Planks';
        } else if ($def_id == 3)
        {
            return 'Measurement Pallet & Parts';
        } else if ($def_id == 4)
        {
            return 'Position Nails';
        } else if ($def_id == 5)
        {
            return 'Corners/Stamps';
        } else if ($def_id == 6)
        {
            return 'Abnormality Material';
        }

        return 'n/a';
    }
}
