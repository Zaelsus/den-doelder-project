<?php

namespace Database\Seeders;

use App\Models\PalletMaterial;
use Illuminate\Database\Seeder;

class PalletMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i< 9;$i++) {
           PalletMaterial::factory(1)->create();
        }
    }
}
