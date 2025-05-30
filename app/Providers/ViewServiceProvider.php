<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Notification;
use App\Services\MikrotikApiService;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $count = new MikrotikApiService();
        $countCustomer = count($count->getSecret());

        View::composer('layouts.app', function($view) use ($countCustomer) {
            $view->with([
                'countPayment' => Payment::count(),
                'countOrder' => Order::count(),
                'countCustomer' => $countCustomer,
                // 'notificationCount' => Notification::count()
            ]);
        });
    }
}
