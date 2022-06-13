<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence,
            'content'=>$this->faker->realTextBetween(100),
            'label'=>$this->faker->randomElement(['Error', 'Fix', 'Other']),
            'priority'=>$this->faker->randomElement(['low', 'medium', 'high']),
            'creator' =>$this->faker->randomElement(['Administrator', 'Production', 'TruckDriver']),
            'order_id' => Order::all()->random()->id,
        ];
    }
}
