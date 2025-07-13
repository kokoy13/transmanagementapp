<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthService
{
    public function handleCallback(string $provider): string
    {
        $socialUser = Socialite::driver($provider)->user();

        $registeredUser = User::where('email', $socialUser->email)->first();

        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'socialite_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => Hash::make(Str::random(16)),
                'socialite_token' => $socialUser->token,
                'socialite_refresh_token' => $socialUser->refreshToken,
                'avatar' => $socialUser->avatar,
            ]);

            Auth::login($user);
            return Str::slug($user->name);
        }

        Auth::login($registeredUser);
        return Str::slug($registeredUser->name);
    }
}
