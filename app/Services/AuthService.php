<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthService
{
    public function authenticate(array $credentials): ?string
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'customer') {
                session(['role' => $user->role]);
                return route('home', ['name' => Str::slug($user->name)]);
            }

            Auth::logout(); // jika bukan customer
        }

        return null; // gagal login
    }
}
