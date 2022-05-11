<?php

namespace Database\Factories;

use App\Models\Pallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pallet_id'=>Pallet::all()->random()->product_id,
            'machine'=>$this->faker->randomElement(['Cape 1', 'Cape 2', 'Cape 5']),
            'quantity_production'=>$this->faker->numberBetween(1000, 3000),
            'client_name'=>$this->faker->name,
            'client_address'=>$this->faker->address,
        ];
    }
}
