<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'transaction_reference' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'], // Max 2MB
        ];
    }

    public function messages(): array
    {
        return [
            'transaction_reference.required' => 'Bukti transaksi wajib diunggah.',
            'transaction_reference.file' => 'Bukti transaksi harus berupa file.',
            'transaction_reference.mimes' => 'Format file harus JPG, JPEG, PNG, atau PDF.',
            'transaction_reference.max' => 'Ukuran file maksimal 2MB.',
        ];
    }
}
