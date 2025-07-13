<?php

namespace App\Http\Controllers\Auth;

use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use App\Services\SocialAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    protected $socialAuthService;
    protected $authService;

    public function __construct(?SocialAuthService $socialAuthService = null, ?AuthService $authService)
    {
        $this->socialAuthService = $socialAuthService ?? new \App\Services\SocialAuthService();
        $this->authService = $authService ?? new \App\Services\AuthService();
    }

    public function redirect($provider)
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404); // atau redirect dengan error message
        }

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $slugName = $this->socialAuthService->handleCallback($provider);
        return redirect()->route('home', ['name' => $slugName]);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        }
        return view('auth.sign-in');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $redirect = $this->authService->authenticate($credentials);
        if ($redirect) {
            return redirect()->to($redirect);
        }

        return redirect('sign-in')->with('error', 'Email atau Password tidak valid!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
