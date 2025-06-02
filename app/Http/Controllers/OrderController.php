<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Packet;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('pages.order.index')->with(compact('orders'));
    }

    public function create()
    {
        $orders = Order::all();
        $customers = Customer::all();

        return view('pages.order.create-order', compact('orders','customers'));
    }

    public function store(OrderRequest $request)
    {
        $id = substr('TN' . Str::uuid()->toString(), 0, 8);
        $packet = Packet::where('name',$request->packetName)
        ->where('bandwidth',$request->bandwidth)->get()->first();
       
        $order = Order::create([
            'id' => $id,
            'customer_id' => $request->name,
            'installation_address' => $request->address,
            'order_date' => now(),
            'packet_id' => $packet->id,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('orders')->with('success', 'Berhasil menambahkan orderan.');
    }

    public function edit($id){
        $order = Order::find($id);
        $customers = Customer::all();
        return view('pages.order.edit-order')->with(compact('order','customers'));
    }

    public function update(OrderRequest $request, $id) {
        $order = Order::findOrFail($id);
        $packet = Packet::where('name',$request->name)
        ->where('bandwidth',$request->bandwidth)->get()->first();
        $exists = Order::where('id', '!=', $order->id)
            ->where('customer_id', $request->id)
            ->where('installation_address', $request->address)
            ->where('packet_id', $packet->id)
            ->where('status', $request->status)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Data sudah tersedia.');
        }

        $order->id = $id;
        $order->customer_id = $request->id;
        $order->status = $request->status;
        $order->installation_address = $request->address;
        $order->packet_id = $packet->id;
        $order->updated_at = now();

        $order->save();
        return redirect()->route('orders')->with('success', 'Berhasil edit order');
    }
    

    public function delete($id){
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('orders')->with('success', 'Order berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->route('orders')->with('error', 'Terjadi kesalahan saat menghapus order.');
        }
    }
}
