<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ContentController::class, 'index']);

Route::get('/sign-in',function(){
    return view('sign-in');
});

Route::get('/sign-up',function(){
    return view('sign-up');
});
