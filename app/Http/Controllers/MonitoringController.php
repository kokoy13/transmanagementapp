<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function getTxRx(){
        return view('pages.monitoring.tx-rx.index');
    }

    public function getActiveConnection(){
        return view('pages.monitoring.active-connection.index');
    }
}
