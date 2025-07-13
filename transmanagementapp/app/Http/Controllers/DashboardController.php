<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\DataFeed;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $countOrder = Order::all()->count();
        $countPayment = Payment::all()->count();
        $banners = Banner::limit(3)->get();
        $content = Content::first();
        $notification = Notification::limit(5)->get();
        return view('pages/dashboard/dashboard')->with(compact('countOrder', 'countPayment', 'banners', 'content', 'notification'));
    }

    public function search(Request $request){
        $key = strtolower($request->search);
        try{
            return redirect()->route($key);
        }catch(\Exception $e){
            return view('pages.utility.404');
        }
    }
}
