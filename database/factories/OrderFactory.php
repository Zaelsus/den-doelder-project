<?php

namespace Database\Factories;


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
            'order_id' => $this->faker->numberBetween(1,999),
            'customer_name' => $this->faker->name,
            'order_production_line' => $this->faker->numberBetween(1,3),
            'scheduled_production_date' => $this->faker->date,
            'pallet_type'=>$this->faker->word,
            'quantity'=>$this->faker->numberBetween(100,999),
            'material_quantity' =>$this->faker->numberBetween(1000,5000),
            'instructions' =>$this->faker->sentence,
        ];
    }
}
