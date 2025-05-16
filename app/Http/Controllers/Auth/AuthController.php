<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $User = Socialite::driver($provider)->user();
        $registeredUser = User::where('email', $User->email)->first();
        if(!$registeredUser) {
            $user = User::updateOrCreate([
                'socialite_id' => $User->id,
            ], [
                'name' => $User->name,
                'email' => $User->email,
                'password' => Hash::make(Str::random(16)),
                'socialite_token' => $User->token,
                'socialite_refresh_token' => $User->refreshToken,
                'avatar' => $User->avatar,
            ]);
            Auth::login($user);
            return redirect()->route('home', ['name' => Str::slug($user->name)]);
        }
        Auth::login($registeredUser);
        return redirect()->route('home', ['name' => Str::slug($registeredUser->name)]);
        
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        }
        return view('auth.sign-in');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'customer') {
                session(['role' => $user->role]);
                $nameSlug = Str::slug($user->name);
                return redirect()->route('home', ['name' => $nameSlug]);
            }

            Auth::logout();
        }

        return redirect('sign-in')->with('error', 'Email atau Password tidak valid!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
