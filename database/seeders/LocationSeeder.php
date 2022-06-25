<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::factory(10)->create();

        DB::table('locations')->insert([
            [
                'name' => 'A1',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A2',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A3',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A4',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A5',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A6',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A7',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A8',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A9',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A10',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A11',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A12',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A13',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A14',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A15',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A16',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A17',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A18',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A19',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A20',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A21',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A22',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A23',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A24',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'A25',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'C-Pallets',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Loods 2',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Loods 3',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Loods C',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Direct',
                'available_storage_space' => 1000,
                'type' => 'Pallets',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
