<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    /**
     * Gets the order related to the note
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
