<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Route Home
Route::get('/',[ContentController::class, 'index']);

//Route Sign In
Route::get('/sign-in', [AuthController::class, 'login']);
Route::post('/sign-in', [AuthController::class, 'authenticate']);

Route::get('/dashboard', [ContentController::class, 'index'])->middleware('auth');

//Route Sign Up
Route::get('/sign-up',function(){
    return view('sign-up');
});