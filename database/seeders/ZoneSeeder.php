<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        DB::table('zones')->insert([
            'name' => 'Zona Cempaka Putih',
            'status' => 'available',
            'geojson' => json_encode([
                "type" => "Polygon",
                "coordinates" => [[
                    [106.865036, -6.176655],
                    [106.866550, -6.176655],
                    [106.866550, -6.178000],
                    [106.865036, -6.178000],
                    [106.865036, -6.176655]
                ]]
            ])
        ]);
    }
}
