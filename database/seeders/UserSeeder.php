<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'role' => 'Administrator',
                'email' => 'admin@dd',
                'password' => Hash::make('aaaaaaaa'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Production',
                'role' => 'Production',
                'email' => 'prod@dd',
                'password' => Hash::make('aaaaaaaa'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Driver',
                'role' => 'Driver',
                'email' => 'driver@dd',
                'password' => Hash::make('aaaaaaaa'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
