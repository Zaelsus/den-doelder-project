<?php

namespace Database\Seeders;

use App\Models\ProductLocation;
use Illuminate\Database\Seeder;

class ProductLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<8;$i++) {
            ProductLocation::factory(1)->create();
        }

    }
}
