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
        for ($i=1; $i <= 10; $i++) { 
            DB::table('packets')->insert([
            [
                'name' => 'Family',
                'bandwidth' => $i*10,
                'price' => $i*288000,
                'desc' => 'Sempurna untuk keluarga kecil dengan kebutuhan internet dasar seperti browsing dan streaming.',
                'rasio' => '1:8',
            ],[
                'name' => 'Office',
                'bandwidth' => $i*10,
                'price' => $i*312000,
                'desc' => 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.',
                'rasio' => '1:4',
            ],
            [
                'name' => 'Dedicated',
                'bandwidth' => $i*10,
                'price' => $i*1000000,
                'desc' => 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.',
                'rasio' => '1:1',
            ]
            ]);
        }
    }
}
