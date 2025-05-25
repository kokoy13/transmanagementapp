<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('order.packet')
            ->get()
            ->filter(function ($customer) {
                return $customer->user->role === 'customer';
            }
        );
        return view('pages.customer.index', compact('customers'));
    }
}
