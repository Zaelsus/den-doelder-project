<?php

namespace Database\Seeders;

use App\Models\HourlyReport;
use Illuminate\Database\Seeder;

class HourlyReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HourlyReport::factory(5)->create();
    }
}
