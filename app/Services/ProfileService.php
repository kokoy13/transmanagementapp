<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileService{

    public function getUser(){
        return User::find(Auth::user()->id);
    }
}
