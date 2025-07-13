<?php
namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')->get();
        return view('pages.payment.index')->with(compact('payments'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('pages.payment.create-payment', compact('orders'));
    }

    public function store(PaymentRequest $request)
    {
        $validated = $request->validated();
        $exist = Payment::where('order_id', $validated['order_id'])->exists();
        if ($exist) {
            return back()->with('error', 'Data payment sudah tersedia');
        }
        if ($request->hasFile('transaction_reference')) {
            $store = $request->file('transaction_reference')->store('public/payments');
            $validated['transaction_reference'] = basename($store);
        }

        $id = substr('Pay' . Str::uuid()->toString(), 0, 8);

        $payment = Payment::create([
            'id' => $id,
            'order_id' => $validated['order_id'],
            'payment_date' => $validated['payment_date'],
            'payment_method' => 'Bank',
            'amount' => $validated['amount'],
            'payment_status' => $validated['payment_status'],
            'transcation_reference' => $validated['transaction_reference']
        ]);

        return redirect()->route('payments')->with('success', 'Berhasil menambahkan pembayaran.');
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return redirect()->route('payments')->with('error', 'Pembayaran tidak ditemukan.');
        }
        $orders = Order::all();
        return view('pages.payment.edit-payment')->with(compact('payment', 'orders'));
    }

    public function update(PaymentRequest $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('transaction_reference')) {
            if ($payment->transcation_reference && Storage::disk('public')->exists('payments/' . $payment->transcation_reference)) {
                Storage::disk('public')->delete('payments/' . $payment->transcation_reference);
            }
            $store = $request->file('transaction_reference')->store('public/payments');
            $validated['transaction_reference'] = basename($store);
        }

        $payment->order_id = $validated['order_id'];
        $payment->payment_date = $validated['payment_date'];
        $payment->amount = $validated['amount'];
        $payment->payment_status = $validated['payment_status'];
        $payment->transcation_reference = $validated['transaction_reference'];

        $payment->save();

        return redirect()->route('payments')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function delete($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            return redirect()->route('payments')->with('error', 'Pembayaran tidak ditemukan.');
        }

        if ($payment->transcation_reference && Storage::disk('public')->exists('payments/' . $payment->transcation_reference)) {
            Storage::disk('public')->delete('payments/' . $payment->transcation_reference);
        }

        $payment->delete();

        return redirect()->route('payments')->with('success', 'Berhasil menghapus pembayaran.');
    }
}
