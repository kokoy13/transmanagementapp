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
        $validated = $request->validated();
        if($validated['password'] != $validated['password_confirmation']){
            return redirect()->route('user.create')->with('error','Password tidak cocok, ulangi kembali');
        }
        $store = $request->file('avatar')->store('public/avatars');
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
            'avatar' => basename($store),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('users')->with('success', 'Berhasil membuat akun');
    }

    public function edit($id){
        $user = User::find($id);

        return view('pages.user.edit-user')->with(compact('user'));
    }

    public function update(UserRequest $request, $id){
        $validated = $request->validated();
        if($validated['password'] != $validated['password_confirmation']){
            return redirect()->route('user.edit')->with('error','Password tidak cocok, ulangi kembali');
        }

        // if ($request->hasFile('avatar')) {
        //     if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
        //         Storage::disk('public')->delete($user->avatar);
        //     }
        //     $store = $request->file('thumbnail')->store('public');
        //     $banner->img = basename($store);
        // }
        // $user = User::find($id);

        // $user->name =
    }

    public function delete(){

    }
}
