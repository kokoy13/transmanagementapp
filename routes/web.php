<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ZoneController;

//Route Home
Route::get('/', [ContentController::class, 'index']);
Route::get('/home', [ContentController::class, 'index']);

//Route Sign In
Route::get('/sign-in', [AuthController::class, 'login']);
Route::post('/sign-in', [AuthController::class, 'authenticate']);

Route::get('/home/{name}', [ContentController::class, 'index'])->middleware('auth')->name('home');

//Route Sign Up
Route::get('/sign-up', function () {
    return view('auth.sign-up');
});

//route Sign up
Route::post('/sign-up', [RegisterController::class, 'register']);

//Route Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route search Availability Zone
Route::get('/zones', [ZoneController::class, 'index']);

//ROute create Zone
Route::get('/map', function () {
    return view('front.zone');
});

//Route redirect auth socialite
Route::get('/auth/redirect/{provider}',[AuthController::class, 'redirect'])->name('auth.redirect');

//Route callback auth socialite
Route::get('/auth/{provider}/callback',[AuthController::class, 'callback']);

//Route Price List
Route::get('/packets',[PacketController::class, 'getPacket']);

//Route Details
Route::get('/packet/details/{id}', [PacketController::class, 'getPacketId'])->name('packet.details');