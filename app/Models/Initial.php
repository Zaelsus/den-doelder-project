<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initial extends Model
{
    use HasFactory;

    protected $guarded =[];

    /**
     * Gets the pallet related to the order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * Assigns order id to initial check
     */
    public function assignorderid($id)
    {
        $this->order_id = $id;
        $this->save();
    }

}
