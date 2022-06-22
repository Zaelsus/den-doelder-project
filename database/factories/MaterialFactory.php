<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // generating the correct product to get the right id
        $product = Material::addProduct();
        return [
            'product_id'=>$product->id,
        ];
    }
}
