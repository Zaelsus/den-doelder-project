<?php

namespace Database\Factories;

use App\Models\Machine;
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
            'order_number'=>$this->faker->numberBetween(1000, 3000),
            'pallet_id'=>Pallet::all()->random()->product_id,
            'machine_id'=>Machine::all()->random()->id,
            'quantity_production'=>$this->faker->numberBetween(1000, 3000),
        ];
    }
}
