<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        if ($request->password != $request->password2 || $emailExists) {
            return redirect("sign-up")->with("error", "Password invalid atau Email sudah terdaftar");
        }

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar' => 'https://ui-avatars.com/api/?name=' . $request->name . '&background=random&color=fff&size=128',
            ]
        );
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $name = Str::slug(Auth::user()->name);
            return redirect()->route('home', ['name' => $name])->with('success', 'Berhasil menambahkan user ');
        }
    }
}