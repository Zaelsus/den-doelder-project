<?php

namespace Database\Factories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $check = false;
        $i = 0;
        while (!$check && $i <= 100) {
           $name = $this->faker->randomElement(['Cape 1', 'Cape 2', 'Cape 5']);
            if (Machine::all()->count() !== 0) {
                $j = 1;
                $innercheck = true;
                // goes over the table to make sure the combination of values generated dont exist already
                while ($innercheck && $j <= Machine::all()->count()) {
                    $currentRow = Machine::find($j);
                    $tempName = $currentRow->name;
                    if ($name === $tempName) {
                        $innercheck = false;
                    } else {
                        $innercheck = true;
                    }
                    $j++;
                }
                //if the combination doesnt exist we can exit the big loop and use these values
                if ($innercheck) {
                    $check = true;
                } else {
                    $check = false;
                }

            } // if the table is empty the inner check isnt needed
            else {
                $check = true;
            }
            $i++;
        }
        if($check) {
            return [
                'name'=> $name,
            ];
        }
        return [
            'name'=> 'error',
        ];

    }
}
