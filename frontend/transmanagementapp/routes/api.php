<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/upload-from-a', function (Request $request) {
    $request->validate([
        'file' => 'required|file',
    ]);
    $originalName = $request->file('file')->getClientOriginalName();
    $path = $request->file('file')->storeAs('banners', $originalName);
});
