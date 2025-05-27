<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role','!=','customer')->get();
        return view('pages.user.index')->with(compact('users'));
    }

    public function create(){
        return view('pages.user.create-user');
    }

    public function store(UserRequest $request){
        dd($request);
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
