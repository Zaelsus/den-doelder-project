<?php

namespace Database\Seeders;

use App\Models\Production;
use App\Models\Order;

use Illuminate\Database\Seeder;


class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4;$i++) {
            Production::factory(1)->create();
        }
    }
}
