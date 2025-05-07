<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        if ($request->password != $request->password2 || $emailExists) {
            return redirect("sign-up")->with("error", "Password Tidak Sama atau Email Sudah Terdaftar");
        }

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );
        return redirect('/dashboard')->with('success', 'Berhasil Menambahkan User ');
    }
}