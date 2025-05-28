<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_id' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_status' => 'required|string',
            'transaction_reference' => [
                $this->isMethod('POST') ? 'required' : 'nullable',
                'image',
                'max:5120'
            ],
        ];
    }

    public function messages()
    {
        return [
            'order_id.required' => 'ID pesanan wajib diisi.',
            'order_id.max' => 'ID pesanan tidak boleh lebih dari 255 karakter.',
            'payment_date.required' => 'Tanggal pembayaran wajib diisi.',
            'payment_date.date' => 'Tanggal pembayaran harus dalam format yang valid.',
            'amount.required' => 'Jumlah wajib diisi.',
            'amount.numeric' => 'Jumlah harus berupa angka.',
            'payment_method.required' => 'Metode pembayaran wajib diisi.',
            'payment_status.required' => 'Status pembayaran wajib diisi.',
            // 'transaction_reference.max' => 'Referensi transaksi tidak boleh lebih dari 255 karakter.',
            'thumbnail.required' => 'Thumbnail harus diunggah.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'thumbnail.max' => 'Ukuran gambar maksimal 5MB.',
        ];
    }
}
