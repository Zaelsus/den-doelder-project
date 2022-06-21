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
        // generating the correct product to get the right id
        $product = Pallet::addProduct();
        return [
            'product_id'=>$product->id,
            'pallet_number'=>$this->faker->numberBetween(0, 99999),
            'measurements'=>$this->faker->randomElement(['1200 X 1000', '1000 X 1000']),
            'classification'=>$this->faker->randomElement(['Klos Klasse', 'Dubbeldek niel-omkeerbaar']),
            'treatments'=>$this->faker->randomElement(['Heat Treatment', 'No Treatment']),
            'general_images' => 'https://dummyimage.com/800x600/000/fff.jpg&text=Pallet+Design',
            'detailed_images' => 'https://dummyimage.com/800x600/000/fff.jpg&text=Pallet+Design',
        ];
    }
}
