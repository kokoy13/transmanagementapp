<?php

namespace App\Services;

use App\Models\Content;

class ContentService{

    public function getNews(){
        return Content::all();
    }

    public function searchNews(string $keyword)
    {
        return Content::where('title', 'like', "%$keyword%")
            ->orWhere('excerpt', 'like', "%$keyword%")
            ->get();
    }

    public function getNewsByLimit($limit){
        return Content::orderBy('id','DESC')->limit($limit)->get();
    }
}
