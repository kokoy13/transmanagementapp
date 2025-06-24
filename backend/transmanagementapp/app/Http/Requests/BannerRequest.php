<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => [
                $this->isMethod('POST') ? 'required' : 'nullable',
                'image',
                'max:10240'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama banner wajib diisi.',
            'thumbnail.required' => 'Thumbnail harus diunggah.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
