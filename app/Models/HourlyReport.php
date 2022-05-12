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
}
