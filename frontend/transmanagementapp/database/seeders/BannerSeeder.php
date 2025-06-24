<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'name' => 'Hero Banner',
                'img' => '01JS5D6QZHDJGMBG9YS3H9TQR6.png',
            ],
            [
                'name' => 'Family Banner',
                'img' => '01JS5D66S7GAXXRB0EDBVS14FS.jpeg',
            ],
            [
                'name' => 'Office Banner',
                'img' => '01JS5BJD012CBZTJVXSJS9REZX.jpeg',
            ],
        ]);
    }
}
