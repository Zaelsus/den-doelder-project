<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    use CsvReadable;

    /**
     * Construct a new ResultSeeder
     */
    public function __construct()
    {
        $this->path = "seed_files/materials.csv";
        $this->delimiter = ";";
        $this->header_row = 0;
        $this->start_row = 1;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->readCsvData(function ($data) {
//            $this->command->info(json_encode($data));
            if($data['Material']!=='') {
                Material::factory(1)->create(['measurements' => $data['Material']]);
            }

        });
    }
}
