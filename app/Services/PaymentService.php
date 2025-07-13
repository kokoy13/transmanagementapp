<?php

namespace App\Services;

use App\Models\Order;


class PaymentService{
    public function getPayment($order_id){
        $payment = Order::find($order_id);
        return $payment;
    }
}
