<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Packet;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function getOrder(Request $request)
    {
        $packet = Packet::find($request->id);
        $user = $request->user();

        if (!$packet || !$user) {
            return redirect()->back()->with('error', 'Packet not found');
        }
        return view('order.form-order')->with(compact('packet', 'user'));
    }

    public function setOrder(Request $request)
    {
        $packet = Packet::where('name', $request->packetName)->where('bandwidth', $request->bandwidth)->first();
        $order = Order::create([
            'id' => 'TN' . Str::upper(Str::random(5)),
            'user_id' => Auth::user()->id,
            'order_date' => now(),
            'installation_address' => $request->installationAddress,
            'packet_id' => $packet->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/')->with('success', 'Order created successfully');
    }

    public function checkOrder(){
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $orderCount = $orders->count();
        return view('order.check-order')->with(compact('orders', 'orderCount'));
    }
}
