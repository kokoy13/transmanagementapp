<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::find(Auth::user()->id);

        return view('front.profile')->with(compact('profile'));
    }

    public function edit(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui');
    }
}
