<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('pages.banner.index')->with(compact('banners'));
    }

    public function edit($id){
        $banner = Banner::find($id);
        return view('pages.banner.edit-banner')->with(compact('banner'));
    }

    public function update(BannerRequest $request, $id){
        $banner = Banner::find($id);

    }
}
