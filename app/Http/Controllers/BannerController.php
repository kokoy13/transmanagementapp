<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function getAll(){
        $banners = Banner::all();
        return $banners;
    }
}
