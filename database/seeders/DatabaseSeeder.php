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
            UserSeeder::class,
            LocationSeeder::class,
            PalletSeeder::class,
            MaterialSeeder::class,
            ProductLocationSeeder::class,
            MachineSeeder::class,
            OrderSeeder::class,
            OrderMaterialSeeder::class,
            HourlyReportSeeder::class,
            NoteSeeder::class,
            ProductionSeeder::class,
            InitialSeeder::class,
            PalletMaterialSeeder::class,
        ]);
    }
}
