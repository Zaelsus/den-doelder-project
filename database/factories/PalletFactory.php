<?php

namespace Database\Factories;

use App\Models\Pallet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Pallet::addProduct();
        return [
            'product_id'=>$product->id,
            'name'=>$this->faker->name,
            'pallet_number'=>$this->faker->numberBetween(0, 99999),
            'measurement'=>$this->faker->randomElement(['1200 X 1000', '1000 X 1000']),
            'classification'=>$this->faker->randomElement(['Klos Klasse', 'Dubbeldek niel-omkeerbaar']),
            'treatments'=>$this->faker->randomElement(['Heat Treatment', 'No Treatment']),
            'general_images' => 'http://loremflickr.com/800/600?lock='.
                $this->faker->numberBetween(1,65535),
            'detailed_images' => 'http://loremflickr.com/800/600?lock='.
                $this->faker->numberBetween(1,65535),
        ];
    }
}
