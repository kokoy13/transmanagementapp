<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        $profile = $this->profileService->getUser();
        return view('front.profile')->with(compact('profile'));
    }

    public function edit(UpdateProfileRequest $request)
    {
        $user = $this->profileService->getUser();
        $validated = $request->validated();

        $user->fill($validated);

        if ($user->isDirty()) {
            $user->save();
            return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui');
        }

        return redirect()->route('profile');
    }

}
