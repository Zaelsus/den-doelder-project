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
        $this->call([
            LocationSeeder::class,
            PalletSeeder::class,
            MaterialSeeder::class,
            ProductLocationSeeder::class,
            OrderSeeder::class,
            OrderMaterialSeeder::class,
            HourlyReportSeeder::class,
            ProductionSeeder::class
        ]);
    }
}
