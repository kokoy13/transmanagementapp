<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;

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
//Route Search Packet
Route::post('/packets', [PacketController::class, 'searchPacket'])->name('packets.search');

//Route Order Form
Route::get('/order/{id}', [OrderController::class, 'getOrder'])->middleware('auth')->name('order.form');

//Route Order Create
Route::post('/order', [OrderController::class, 'setOrder'])->middleware('auth')->name('order.set');

//Route Check Order
Route::get('/check-order', [OrderController::class, 'checkOrder'])->name('order.check');

//Route Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::put('/profile', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');

//Route News
Route::get('/news', [ContentController::class, 'news'])->name('news');
Route::post('/news', [ContentController::class, 'searchNews'])->name('search.news');

//Route Request
Route::get('/notificataions', [NotificationController::class, 'index'])->name('notifications');

//Route Request
Route::get('/request', [RequestController::class,'index'])->name('requests');

//Route Budaya Perusahaan
Route::get('/budaya-perusahaan', function(){
    return view('front.budayaperusahaan');
})->name('budaya-perusahaan');

//Route Sejarah
Route::get('/sejarah-perusahaan', function(){
    return view('front.sejarah');
})->name('sejarah-perusahaan');

//Route Visi Misi
Route::get('/visi-misi', function(){
    return view('front.visimisi');
})->name('visimisi');

Route::get('/contact', function(){
    return view('front.contact');
})->name('contact');
