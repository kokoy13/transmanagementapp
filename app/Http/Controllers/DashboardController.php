<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\DataFeed;
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
        return view('pages/dashboard/dashboard')->with(compact('countOrder', 'countPayment', 'banners', 'content'));
    }

    /**
     * Displays the analytics screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function analytics()
    {
        return view('pages/dashboard/analytics');
    }

    /**
     * Displays the fintech screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fintech()
    {
        return view('pages/dashboard/fintech');
    }
}
