<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'bandwidth' => 'required|integer',
            'price' => 'required|integer',
            'desc' => 'nullable|string',
            'rasio' => 'required|string|max:255',
        ];
    }
}
