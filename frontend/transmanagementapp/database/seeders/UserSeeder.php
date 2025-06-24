<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'name' => 'transnet',
            'email' => 'transnet@example.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'avatar' => 'https://ui-avatars.com/api/?name=' . 'transnet' . '&background=random&color=fff&size=128',
        ],[
            'name' => 'transnetsumbar',
            'email' => 'transnetsumbar@gmail.com',
            'password' => Hash::make('transnetsumbar'),
            'role' => 'admin',
            'avatar' => 'https://ui-avatars.com/api/?name=' . 'transnetsumbar' . '&background=random&color=fff&size=128',
        ],
        [
            'name' => 'marketing',
            'email' => 'transnetmarketing@gmail.com',
            'password' => Hash::make('transnetmarketing'),
            'role' => 'marketing',
            'avatar' => 'https://ui-avatars.com/api/?name=' . 'marketing' . '&background=random&color=fff&size=128',
        ]
        ]);
    }
}