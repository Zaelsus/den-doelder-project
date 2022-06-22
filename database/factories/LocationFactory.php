<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomLetter,
            'available_storage_space'=>$this->faker->numberBetween(0,100),
            'type'=>$this->faker->randomElement(['Pallets', 'Materials']),
        ];
    }
}
