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
            'measurements'=>$this->faker->randomElement(['1000 X 48 X 98', '1000 X 100 X 22']),
            'comments'=>$this->faker->randomElement(['BC', 'INC', 'met poortjes','']),
        ];
    }
}
