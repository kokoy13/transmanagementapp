<?php

namespace App\Services;

use App\Models\Banner;

class BannerService
{
    public function getAllBanners()
    {
        return Banner::all();
    }
}
