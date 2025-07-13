<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Services\ContentService;
use App\Services\BannerService;
use App\Services\PacketService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct(
        protected BannerService $bannerService,
        protected PacketService $packetService,
        protected ContentService $contentService
    ) {}

    public function index()
    {
        $packets = (new PacketService)->getTopPackets();
        $banners = (new BannerService)->getAllBanners();

        return view('front.home', compact('packets', 'banners'));
    }

    public function news()
    {
        $contents = $this->contentService->getNews();
        $popularPosts = $this->contentService->getNewsByLimit(3);
        return view('front.news')->with(compact('contents','popularPosts'));
    }

    public function searchNews(Request $request)
    {
        $keyword = $request->keyword;
        $contents = $this->contentService->searchNews($keyword);
        $popularPosts = $this->contentService->getNewsByLimit(3);

        return view('front.news', compact('contents', 'keyword', 'popularPosts'));
    }
}
