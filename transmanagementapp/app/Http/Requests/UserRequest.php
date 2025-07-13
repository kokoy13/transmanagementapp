<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $userId = $isUpdate ? $this->route('user')->id ?? $this->route('id') : null;

        return [
            'name' => 'required|string|max:255|min:2',
            'email' => [
                'required',
                'email',
                'max:255',
                $isUpdate ? Rule::unique('users')->ignore($userId) : 'unique:users',
            ],
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'password' => $isUpdate ? 'nullable|min:8' : 'required|min:8',
            'password_confirmation' => $isUpdate ? 'required_with:password|same:password' : 'required|same:password',
            'role' => 'required|in:admin,marketing,customer',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama user wajib diisi.',
            'name.min' => 'Nama user minimal 2 karakter.',
            'name.max' => 'Nama user maksimal 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'email.max' => 'Email maksimal 255 karakter.',

            'phone_number.max' => 'Nomor telepon maksimal 255 karakter.',

            'address.max' => 'Alamat maksimal 255 karakter.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',

            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            'password_confirmation.required_with' => 'Konfirmasi password wajib diisi jika password diubah.',
            'password_confirmation.same' => 'Konfirmasi password tidak cocok.',

            'role.required' => 'Role user wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',

            'avatar.image' => 'Avatar harus berupa gambar.',
            'avatar.mimes' => 'Avatar harus berformat: jpeg, png, jpg, gif.',
            'avatar.max' => 'Ukuran avatar maksimal 2MB.',
        ];
    }
}
