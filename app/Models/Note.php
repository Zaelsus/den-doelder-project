<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Gets the order related to the note
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * if there is an error note without a fix note, the priority is high.
     * if there is an error note with a fixe note, the priority goes to low again.
     * @return void
     */
    public function updatePriority(): void
    {
        if($this->fix === 'Error!') {
           $this->update(['priority' => 'high']);
        }
        if($this->note_rel !== null) {
            self::where('id', $this->note_rel)->update(['priority' => 'low']);
        }

        $this->save();
    }

    public function logPalletQuantity($order) {
        $order->quantity_produced += $this->numberLog;
        $order->save();

        if($order->quantity_produced > $order->quantity_production) {
            $error = true;
        }
        else {
            $error = false;
        }
        return $error;
    }
}
