<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Material;
use App\Models\Pallet;
use App\Models\ProductLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductLocationFactory extends Factory
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
        while (!$check && $i <= 100 ) {
            $location = Location::all()->random();
            if ($location->type === 'Pallets') {
                $product_id = Pallet::all()->random()->product_id;
            } else {
                $product_id = Material::all()->random()->product_id;
            }
            if (ProductLocation::all()->count() !== 0) {
                $j = 1;
                $innercheck = true;
                while ($innercheck && $j <= ProductLocation::all()->count()) {
                    $currentRow = ProductLocation::find($j);
                    $tempLocationID = $currentRow->location_id;
                    $tempProductID = $currentRow->product_id;
                    if ($location->id === $tempLocationID && $product_id === $tempProductID) {
                        $innercheck = false;
                    } else {
                        $innercheck = true;
                    }
                    $j++;
                }
                if ($innercheck) {
                    $check = true;
                } else {
                    $check = false;
                }

            } else {
                $check = true;
            }
            $i++;
        }

        if ($check) {
            return [
                'location_id' => $location->id,
                'product_id' => $product_id,
                'quantity' => $this->faker->numberBetween(1, 500),
                'test' => 'works',
            ];
        } else {
            return [
                'location_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'test' => 'stop',
            ];
        }

    }
}
