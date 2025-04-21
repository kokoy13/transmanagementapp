<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\PacketController;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $packetController = new PacketController();
        $bannerController = new BannerController();

        $packets = $packetController->getAll();
        $banners = $bannerController->getAll();

        return view('home',["packets"=>$packets, "banners"=>$banners]);
    }
}
