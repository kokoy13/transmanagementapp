<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PacketController;

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

    public function searchNews(Request $request){
        $keyword = $request->keyword;
        $contents = Content::where('title','like',"%$keyword%")
                        ->orWhere('excerpt','like',"%$keyword%")
                        ->get();
        return view('front.news')->with(compact('contents', 'keyword'));
    }
}
