<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\PacketController;
use App\Models\Content;

class ContentController extends Controller
{
    public function index(){
        $packetController = new PacketController();
        $bannerController = new BannerController();

        $packets = $packetController->getContent();
        $banners = $bannerController->getContent();

        return view('front.home',["packets"=>$packets, "banners"=>$banners]);
    }

    public function news(){
        $contents = Content::all();
        return view('front.news')->with(compact('contents'));
    }
}
