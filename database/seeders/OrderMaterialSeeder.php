<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Order;
use App\Models\OrderMaterial;
use Illuminate\Database\Seeder;

class OrderMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $maxNumPossible = (Order::all()->count())* (Material::all()->count());
        for($i=0;$i< 10;$i++) {
            OrderMaterial::factory(1)->create();
        }
    }
}
