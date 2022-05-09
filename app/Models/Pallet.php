<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    use HasFactory;

    /**
     * This function adds a new result to the grade if the conditions are met
     */
    public static function addProduct()
    {
        Product::create(([
            'type'=>'pallet']));

        return Product::latest()->get('id');
    }

}
