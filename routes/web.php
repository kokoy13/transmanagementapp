<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RegisterController;
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
    return view('sign-up');
});

//route Sign up
Route::post('/sign-up', [RegisterController::class, 'register']);

//Route Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route search Availability Zone
Route::get('/zones', [ZoneController::class, 'index']);

//ROute create Zone
Route::get('/map', function () {
    return view('zone');
});

//ROute Order Form
Route::get('/order-form', function () {
    return view('form-order');
});

//ROute Notification
Route::get('/notification', function () {
    return view('notification.index');
});

//ROute Request Bandwidth
Route::get('/bandwidth-request', function () {
    return view('request.request-bandwidth');
});

//Route redirect auth socialite
Route::get('/auth/redirect/{provider}',[AuthController::class, 'redirect'])->name('auth.redirect');

//Route callback auth socialite
Route::get('/auth/{provider}/callback',[AuthController::class, 'callback']);