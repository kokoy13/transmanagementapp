<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Notification;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function($view){
            $view->with([
                'countPayment' => Payment::count(),
                'countOrder' => Order::count(),
                'countCustomer' => Customer::count(),
            //     // 'notificationCount' => Notification::count()
            ]);
        });
    }
}
