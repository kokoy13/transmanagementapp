<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role','customer')->doesnthave('customer')->get();
        foreach ($users as $user) {
            DB::table('customers')->insert([
                'id' => 'CUS' . Str::upper(Str::random(5)),
                'user_id' => $user->id,
                'full_name' => $user->name,
                'email' => $user->email,
                'phone_number' => Factory::create()->phoneNumber(),
                'address' => Factory::create()->address(),
            ]);
        }
    }
}
