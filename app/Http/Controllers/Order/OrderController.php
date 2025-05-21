<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function setOrder(Request $request)
    {
        return view('order.form-order');
    }
}
