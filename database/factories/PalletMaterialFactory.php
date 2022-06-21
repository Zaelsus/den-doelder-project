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
            return [
                'test' => 'works',
            ];
        }
}
