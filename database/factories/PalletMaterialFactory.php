<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Pallet;
use App\Models\PalletMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class PalletMaterialFactory extends Factory
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
        // in this loop we generate values for the new row that will be added while making sure that combination of values does not exist yet (preventing repetition)
        while (!$check && $i <= 100) {
            $pallet_id = Pallet::all()->random()->product_id;
            $material_id = Material::all()->random()->product_id;
            // making sure the table isnt empty
            if (PalletMaterial::all()->count() !== 0) {
                $j = 1;
                $innercheck = true;
                // goes over the table to make sure the combination of values generated dont exist already
                while ($innercheck && $j <= PalletMaterial::all()->count()) {
                    $currentRow = PalletMaterial::find($j);
                    $tempPalletID = $currentRow->pallet_id;
                    $tempMaterialID = $currentRow->material_id;
                    if ($pallet_id === $tempPalletID && $material_id === $tempMaterialID) {
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
        // if the check passed we put the new values
        if ($check) {
            return [
                'pallet_id' => $pallet_id,
                'material_id' => $material_id,
                'total_quantity' => $this->faker->numberBetween(1, 13),
                'test' => 'works',
            ];
        } //test for the programmers
        else {
            return [
                'pallet_id' => 1,
                'material_id' => 4,
                'total_quantity' =>0,
                'test' => 'stop',
            ];
        }
    }
}
