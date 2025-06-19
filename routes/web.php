<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RebootController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/search', [DashboardController::class, 'search'])->name('search');

    //Monitoring Route
    Route::get('/tx-rx', [MonitoringController::class, 'index'])->name('txrx');
    Route::get('/traffic/{id}', [MonitoringController::class, 'traffic'])->name('monitor.traffic');
    Route::get('/interface-traffic/data/{id}', [MonitoringController::class, 'getTxRx']);
    Route::get('/active-connection', [MonitoringController::class, 'getActiveConnection'])->name('active-connection');

    //Customer Route
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::post('/customers', [CustomerController::class, 'action'])->name('customer.action');

    //Orders Route
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::get('/order/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
    Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');


    //Payment Route
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payment/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/payment/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');

    //Notification Route
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

    //Service Route
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/service/create', [ServicesController::class, 'create'])->name('service.create');
    Route::post('/service', [ServicesController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{id}', [ServicesController::class, 'edit'])->name('service.edit');
    Route::put('/service/{id}', [ServicesController::class, 'update'])->name('service.update');
    Route::get('/service/delete/{id}', [ServicesController::class, 'delete'])->name('service.delete');

    //Content Route
    Route::get('/contents', [ContentController::class, 'index'])->name('contents');
    Route::get('content/create', [ContentController::class, 'create'])->name('content.create');
    Route::post('/content', [ContentController::class, 'store'])->name('content.store');
    Route::get('/content/{id}', [ContentController::class, 'edit'])->name('content.edit');
    Route::put('/content/{id}', [ContentController::class, 'update'])->name('content.update');
    Route::get('/content/delete/{id}', [ContentController::class, 'delete'])->name('content.delete');

    //Banner Route
    Route::get('/banners', [BannerController::class, 'index'])->name('banners');
    Route::get('banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::get('/banner/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');

    //User Route
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    //Reboot Route
    Route::get('/reboot', [RebootController::class, 'index'])->name('reboot');
    Route::get('/utility/404', function () {
        return view('pages/utility/404');
    })->name('404');
    Route::fallback(function() {
        return view('pages/utility/404');
    });
});
