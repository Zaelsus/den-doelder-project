<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
    use HasFactory;
    protected $attributes = [
    ];

    /**
     * This function creates a new product and returns that product
     */
    public static function addProduct()
    {
        Product::create(([
            'type'=>'material']));
        return DB::table('products')->orderBy('id','desc')->first();
    }

    /**
     * Gets the product related to the material
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     *Getts the orderMaterials related to the material
     */
    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class,'material_id');
    }


}
