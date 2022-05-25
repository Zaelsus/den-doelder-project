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
        'status' => 'Pending',
        'start_time' => null,
        'end_time' => null,
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
        return $this->hasMany(Note::class,'order_id');
    }

    /**
     * returns if there is an order in production
     */
    public static function isInProduction()
    {
        $orderInProduction = Order::where('status', 'In Production')->orwhere('status', 'Paused')->first();
        if ($orderInProduction !== null) {
            if ($orderInProduction->status === 'In Production') {
                return 'In Production';
            }
            return 'Paused';
        }
        return 'no production';
    }

    public function getQuantityMadeAttribute()
    {
        if ($this->quantity_produced > $this->quantity_production)
        {
            return $this->quantity_production;
        }
        else
        {
            return $this->quantity_produced;
        }
    }

    /**
     * Function to add pallets to the running total
     * @return void
     */
    public function addProduced()
    {
        // TODO: Needs update to use a parameter in the above () instead of the add_quantity column
        $this->quantity_produced +=  $this->add_quantity;
        $this->add_quantity = 0;
        $this->save();
    }
}
