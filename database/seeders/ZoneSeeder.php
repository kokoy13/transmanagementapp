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
        // Insert kecamatan dulu
        $kecamatan = [
            'Padang Barat',
            'Padang Timur',
            'Padang Utara'
        ];

        $kelurahanData = [
            'Padang Barat' => [
                'Belakang Tangsi',
                'Berok Nipah',
                'Flamboyan Baru',
                'Kampung Jao',
                'Kampung Pondok',
                'Purus',
                'Rimbo Kaluang',
                'Ujung Gurun'
            ],
            'Padang Timur' => [
                'Simpang Haru',
                'Sawahan',
                'Sawahan Timur',
                'Jati'
            ],
            'Padang Utara' => [
                'Alai Parak Kopi',
                'Gunung Pangilun',
                'Lolong Belanti',
                'Ulak Karang Selatan',
                'Ulak Karang Utara'
            ]
        ];

        foreach ($kecamatan as $namaKec) {
            // Insert kecamatan
            $kecId = DB::table('zones')->insertGetId([
                'nama' => $namaKec,
                'type' => 'kecamatan',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Insert kelurahan untuk kecamatan tersebut
            foreach ($kelurahanData[$namaKec] as $namaKel) {
                DB::table('zones')->insert([
                    'nama' => $namaKel,
                    'type' => 'kelurahan',
                    'parent_id' => $kecId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
