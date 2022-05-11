<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            LocationSeeder::class,
            PalletSeeder::class,
            MaterialSeeder::class,
            ProductLocationSeeder::class,
            OrderSeeder::class,
            OrderMaterialSeeder::class,
        ]);
    }
}
