<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pallet;

class PalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Pallet::addProduct();


    }
}
