<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('sign-in');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect("sign-in")->with("error", "Email atau Password tidak valid !");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/sign-in');
    }
}