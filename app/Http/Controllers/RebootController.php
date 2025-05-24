<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RebootController extends Controller
{
    public function index()
    {
        return view('pages.reboot.index');
    }
}
