<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterService
{
    public function register(array $data): ?string
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($data['name']) . '&background=random&color=fff&size=128',
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return route('home', ['name' => Str::slug(Auth::user()->name)]);
        }

        return null;
    }
}
