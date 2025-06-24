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
use App\Http\Middleware\CekLogin;

//Route Home
Route::get('/', [ContentController::class, 'index']);
Route::get('/home', [ContentController::class, 'index']);

//Route Sign In
Route::get('/sign-in', [AuthController::class, 'login']);
Route::post('/sign-in', [AuthController::class, 'authenticate']);

Route::get('/home/{name}', [ContentController::class, 'index'])->middleware(CekLogin::class)->name('home');

//Route Sign Up
Route::get('/sign-up', function () {
    return view('auth.sign-up');
});

//route Sign up
Route::post('/sign-up', [RegisterController::class, 'register']);

//Route Logout
Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware(CekLogin::class)
    ->name('logout');

//Route Zone
Route::get('/map', [ZoneController::class, 'index']);
Route::post('/map', [ZoneController::class, 'checkZone'])->name('zone.checkzone');

//Route redirect auth socialite
Route::get('/auth/redirect/{provider}', [AuthController::class, 'redirect'])
    ->name('auth.redirect');

//Route callback auth socialite
Route::get('/auth/{provider}/callback', [AuthController::class, 'callback']);

//Route Price List
Route::get('/packets', [PacketController::class, 'getPacket']);
//Route Search Packet
Route::post('/packets', [PacketController::class, 'searchPacket'])->name('packets.search');

//Route Order Form
Route::get('/order/{id}', [OrderController::class, 'getOrder'])
    ->middleware(CekLogin::class)
    ->name('order.form');

//Route Order Create
Route::post('/order', [OrderController::class, 'setOrder'])
    ->middleware(CekLogin::class)
    ->name('order.set');

//Route Check Order
Route::get('/check-order', [OrderController::class, 'checkOrder'])
    ->middleware(CekLogin::class)
    ->name('order.check');

//Route Profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware(CekLogin::class)
    ->name('profile');
Route::put('/profile', [ProfileController::class, 'edit'])
    ->middleware(CekLogin::class)
    ->name('profile.edit');

//Route News
Route::get('/news', [ContentController::class, 'news'])->name('news');
Route::post('/news', [ContentController::class, 'searchNews'])->name('search.news');

//Route Notification
Route::get('/notifications', [NotificationController::class, 'index'])
    ->middleware(CekLogin::class)
    ->name('notifications');

//Route Request
Route::get('/request', [RequestController::class, 'index'])
    ->middleware(CekLogin::class)
    ->name('requests');
Route::get('/request/bandwidth', [RequestController::class, 'requestBandwidth'])
    ->middleware(CekLogin::class)
    ->name('requests.bandwidth');
Route::post('/request/bandwidth', [RequestController::class, 'storeBandwidth'])->name('requests.bandwidth');
Route::get('/request/bandwidthevent', [RequestController::class, 'requestBandwidthEvent'])
    ->middleware(CekLogin::class)
    ->name('requests.bandwidthevent');
Route::post('/request/bandwidthevent', [RequestController::class, 'storeBandwidthEvent'])->name('requests.bandwidthevent');



//Route Budaya Perusahaan
Route::get('/budaya-perusahaan', function () {
    return view('front.budayaperusahaan');
})->name('budaya-perusahaan');

//Route Sejarah
Route::get('/sejarah-perusahaan', function () {
    return view('front.sejarah');
})->name('sejarah-perusahaan');

//Route Visi Misi
Route::get('/visi-misi', function () {
    return view('front.visimisi');
})->name('visimisi');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');
