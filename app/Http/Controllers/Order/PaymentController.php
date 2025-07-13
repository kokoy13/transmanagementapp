<?php

namespace App\Http\Controllers\Order;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function getPayment($order_id){
        $payment = $this->paymentService->getPayment($order_id);
        if($payment->user_id != Auth::id()){
            return redirect()->back();
        }
        return view('order.payment-form')->with(compact('payment'));
    }

    public function setPayment(PaymentRequest $request)
    {
        $file = $request->file('transaction_reference');

        // Buat nama file baru dengan timestamp + original name
        $filename = now()->format('YmdHis') . '_' . $file->getClientOriginalName();

        // Simpan file ke disk 'public/transaction_references' dengan nama baru
        $path = $file->storeAs('transaction_references', $filename, 'public');

        // Simpan ke database
        Payment::create([
            'id' => 'PAY' . Str::random(5),
            'order_id' => $request->order_id,
            'payment_date' => now(),
            'amount' => $request->amount,
            'payment_status' => 'Success',
            'transaction_reference' => $path,
        ]);

        $order = Order::find($request->order_id);
        $order->status = 'Installing';
        $order->save();

        return view('front.home')->with('success', 'Berhasil melakukan pembayaran. tunggu konfirmasi dari admin untuk instalasi');
    }
}
