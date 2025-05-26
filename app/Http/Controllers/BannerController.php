<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('pages.banner.index')->with(compact('banners'));
    }

    public function create(){
        $banner = Banner::all()->count();
        if($banner == 5){
            return redirect()->route('banners')->with('error', 'Jumlah banner telah mencapai limit');
        }
        return view('pages.banner.create-banner');
    }

    public function store(BannerRequest $request){
        $banner = $request->validated();
        $store = $request->file('thumbnail')->store('public');
        $create = Banner::create([
            'name' => $banner['name'],
            'img' => basename($store)
        ]);

        return redirect()->route('banners')->with('berhasil menambahkan banner');
    }

    public function edit($id){
        $banner = Banner::find($id);
        return view('pages.banner.edit-banner')->with(compact('banner'));
    }

    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->name = $request->input('name');
        if ($request->hasFile('thumbnail')) {
            if ($banner->img && Storage::disk('public')->exists($banner->img)) {
                Storage::disk('public')->delete($banner->img);
            }
            $store = $request->file('thumbnail')->store('public');
            $banner->img = basename($store);
            $banner->save();
        }

        return redirect()->route('banners')->with('success', 'Banner berhasil diperbarui.');
    }

    public function delete($id){
        $count = Banner::all()->count();
        if($count == 3){
            return redirect()->route('banners')->with('error','Tidak bisa menghapus. Banner sudah pada jumlah minimum.');
        }
        $banner = Banner::find($id);
        $banner->delete();
        Storage::disk('public')->delete($banner->img);
        return redirect()->route('banners')->with('success', 'Berhasil menghapus banner');
    }

}
