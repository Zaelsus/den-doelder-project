<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Pallet;
use App\Models\PalletMaterial;
use Illuminate\Database\Seeder;

class PalletMaterialSeeder extends Seeder
{
    use CsvReadable;

    /**
     * Construct a new ResultSeeder
     */
    public function __construct()
    {
        $this->path = "seed_files/pallet_materials.csv";
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
            if (!(Pallet::where('name', 'LIKE', '%'.$data['Pallets'].'%')->get()->isempty())
            && !(Material::where('measurements','LIKE', $data['Materials'])->get()->isempty())) {
                PalletMaterial::factory(1)->create([
                    'pallet_id' => Pallet::where('name', 'LIKE', '%'.$data['Pallets'].'%')->first()->product_id,
                    'material_id' => (Material::where('measurements','LIKE', $data['Materials'])->first()->product_id),
                    'total_quantity' => $data['Quantity'],
                ]);
            }


        });
    }
}
