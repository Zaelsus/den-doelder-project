<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $attributes = [
        'start_date' => null,
        'site_location' => 'Axel',
        'production_instructions' => '',
        'machine' => '',
        'status' => 'Admin Hold',
        'start_time' => null,
        'end_time' => null,
        'selected' => 0,
    ];


    /**
     *Getts the orderMaterials related to the order
     */
    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class, 'order_id');
    }


    /**
     * Gets the pallet related to the order
     */
    public function pallet()
    {
        return $this->belongsTo(Pallet::class, 'pallet_id', 'product_id');
    }

    /**
     * Gets the production check related to the order
     */
    public function production()
    {
        return $this->hasOne(Production::class, 'order_id');
    }

    /**
     * Gets the pallet related to the order
     */
    public function initial()
    {
        return $this->hasOne(Initial::class, 'order_id');
    }

    /**
     * returns the hourly reports related to the order
     */
    public function hourlyreports()
    {
        return $this->hasMany(HourlyReport::class, 'order_id');
    }

    /**
     *Gets the notes related to the order
     */
    public function notes()
    {
        return $this->hasMany(Note::class, 'order_id');
    }

    /**
     * returns if there is an order in production (for production view)
     */
    public static function isInProduction(Machine $machine)
    {
        $orderInProduction = Order::where('machine', $machine->name)->where(function ($query) {
            $query->where('status', 'In Production')->orwhere('status', 'Paused');
        })->first();
        if ($orderInProduction !== null) {
            if ($orderInProduction->status === 'In Production') {
                return 'In Production';
            }
            return 'Paused';
        }
        return 'no production';
    }

    /**
     * returns if there is an order in production (for production view)
     */
    public static function getOrder(Machine $machine)
    {
        if (Order::isInProduction($machine) === 'In Production') {
            $order = Order::where('status', 'In Production')->first();
        } elseif (Order::isInProduction($machine) === 'Paused') {
            $order = Order::where('status', 'Paused')->first();
        } else{
            return null;
        }

        return $order;

    }


    /**
     * returns if there is an order selected (for admin view)
     */
    public static function isSelected()
    {
        $orderSelected = Order::where('selected', 1)->first();
        if ($orderSelected !== null) {
            return $orderSelected;
        }
        return null;
    }

    /**
     * returns if there is a quality check that exists for the current order
     */
    public static function initialCheckExists(Order $order)
    {
        $initialCheck = $order->initial;
        if ($initialCheck !== null) {
            return true;
        }
        return false;
    }

    /**
     * returns if there is a first batch check that exists for the current order
     */
    public static function prodCheckExists(Order $order)
    {
        $prodCheck = $order->production;
        if ($prodCheck !== null) {
            if ($order->start_date !== null && $order->machine !== null && $order->status === 'Quality Check Pending') {
                $order->status = 'Production Pending';
            }
            return true;
        }
        return false;
    }


  /**
     * Function to add pallets to the quantity produced
     * @return void
     */
    public function addProduced()
    {
        $total = $this->quantity_produced +  $this->add_quantity;
        $this->quantity_produced +=  $this->add_quantity;
        $this->add_quantity = 0;
        $this->save();
    }


    /**
     * Function to return how many pallets are left to be produced
     * @return void
     */
    public function getToProduceAttribute()
    {
        if($this->quantity_production - $this->quantity_produced > 0)
        {
            return $this->quantity_production -$this->quantity_produced;
        }
        else
        {
            return 0;

        }

    }
}
