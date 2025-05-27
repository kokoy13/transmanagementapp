<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Services\MikrotikApiService;

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

    public function getData(){
        $mikrotik = new MikrotikApiService();
        $data = $mikrotik->getData();
        dd($data);
    }

    public function getTraffic(Request $request)
    {
        $interface = $request->get('interface', 'ether1');
        $data = (new MikrotikApiService())->getTraffic($interface);

        return response()->json([
            'rx' => $data['rx-bits-per-second'] ?? 0,
            'tx' => $data['tx-bits-per-second'] ?? 0
        ]);
    }
}
