<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pallet;

class PalletSeeder extends Seeder
{
    use CsvReadable;

    /**
     * Construct a new ResultSeeder
     */
    public function __construct()
    {
        $this->path ="seed_files/pallets.csv";
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
//            // Parse the date (eg. 05-02-2019) to an importable object
//            $data['name'] = \Carbon\Carbon::createFromFormat('d-m-Y', $data['date']);
//            // Parse the time (eg. 19.15) to an importable object
//            $data['time'] = \Carbon\Carbon::createFromFormat('G:i', $data['time']);
//
//            Result::create($data);
            Pallet::factory(1)->create(['name'=>$data['name']]);
        });


    }
}
