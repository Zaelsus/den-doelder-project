<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     *Gets the product-locations related to the product
     */
    public function productlocations()
    {
        return $this->hasMany(ProductLocation::class,'product_id');
    }

    /**
     * Gets the material related to the product
     */
    public function material()
    {
        return $this->hasOne(Material::class,'product_id');
    }

    /**
     * Gets the pallet related to the product
     */
    public function pallet()
    {
        return $this->hasOne(Pallet::class,'product_id');
    }

}
