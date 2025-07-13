<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notification = Notification::all();
        return view('pages.notification.index', ['notification'=>$notification]);
    }
}
