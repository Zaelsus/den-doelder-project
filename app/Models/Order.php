<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $attributes = [
        'start_date'=>null,
        'site_location'=>'Axel',
        'production_instructions'=>'',
        'status'=>'pending',
        'start_time'=>null,
        'end_time'=>null,
        ];

    /**
     *Getts the orderMaterials related to the order
     */
    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class,'order_id');
    }


    /**
     * Gets the pallet related to the order
     */
    public function pallet()
    {
        return $this->belongsTo(Pallet::class, 'pallet_id','product_id');
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
}
