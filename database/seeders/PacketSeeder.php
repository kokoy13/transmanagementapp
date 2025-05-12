<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packets')->insert([
        [
            'name' => 'Family',
            'bandwidth' => 10,
            'price' => 288000,
            'desc' => 'Family Package',
            'rasio' => '1:8',
        ],[
            'name' => 'Office',
            'bandwidth' => 10,
            'price' => 312000,
            'desc' => 'Office Package',
            'rasio' => '1:4',
        ],
        [
            'name' => 'Dedicated',
            'bandwidth' => 10,
            'price' => 1000000,
            'desc' => 'Dedicated Package',
            'rasio' => '1:1',
        ]
        ]);
    }
}
