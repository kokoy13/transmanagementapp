<?php

namespace App\Http\Controllers\Auth;

use App\Services\RegisterService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(?RegisterService $registerService = null)
    {
        $this->registerService = $registerService ?? new \App\Services\RegisterService();
    }

    public function register(RegisterRequest $request)
    {
        $redirect = $this->registerService->register($request->validated());

        if ($redirect) {
            return redirect()->to($redirect)->with('success', 'Berhasil mendaftar dan login');
        }

        return redirect('sign-up')->with('error', 'Gagal melakukan login setelah pendaftaran.');
    }
}
