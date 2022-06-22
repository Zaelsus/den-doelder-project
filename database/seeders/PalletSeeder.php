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
        $this->path = "seed_files/pallets.csv";
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
            if($data['name']!==''){
                Pallet::factory(1)->create(['name' => $data['name']]);
            }
        });


    }
}
