<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $attributes = [
        'available_storage_space' => 0,
    ];

    /**
     *Gets the product-locations related to the location
     */
    public function productlocations()
    {
        return $this->hasMany(ProductLocation::class,'location_id');
    }
}
