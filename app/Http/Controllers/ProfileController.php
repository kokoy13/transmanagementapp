<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index(){
        $profile = User::find(Auth::user()->id);
        return view('front.profile')->with(compact('profile'));
    }

    public function edit(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        $user->save();

        return redirect()->route('profile');
    }
}
