<?php

namespace Database\Seeders;

use App\Models\Initial;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4;$i++) {
            Initial::factory(1)->create();
        }
    }

}
