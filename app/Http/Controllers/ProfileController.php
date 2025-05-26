<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index(){    
        $profile = Customer::find(Auth::user()->customer->id);
        return view('front.profile')->with(compact('profile'));
    }
}
