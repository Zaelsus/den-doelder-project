<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Gets the product related to the productlocation
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    /**
     * Gets the location related to the productlocation
     */
    public function location()
    {
        return $this->belongsTo(location::class, 'location_id');
    }

}
