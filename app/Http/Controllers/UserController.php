<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


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
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists('avatars/'.$user->avatar)) {
                Storage::disk('public')->delete('avatars/'.$user->avatar);
            }
            $store = $request->file('avatar')->store('public/avatars');
            $user->avatar = basename($store);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->updated_at = now();
        $user->save();

        return redirect()->route('users')->with('success', 'User berhasil diperbarui.');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        Storage::disk('public')->delete('avatars/'.$user->avatar);
        return redirect()->route('users')->with('success', 'Berhasil menghapus user');
    }
}
