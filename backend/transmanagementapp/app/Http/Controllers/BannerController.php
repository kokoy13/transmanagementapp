<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Http;
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

        if(Banner::count() >= 5){
            return redirect()->route('banners')->with('error', 'Jumlah banner telah mencapai limit');
        }
        return view('pages.banner.create-banner');
    }

    public function store(BannerRequest $request)
    {
        // Validasi data input
        $banner = $request->validated();

        // Simpan file thumbnail ke storage lokal (public disk)
        $path = $request->file('thumbnail')->store('public');
        // Simpan data ke DB
        $create = Banner::create([
            'name' => $banner['name'],
            'img'  => basename($path)
        ]);

        // Ambil path fisik file untuk dikirim ke Project B
        $filePath = storage_path('app/' . $path);

        if (!file_exists($filePath)) {
            return redirect()->back()->withErrors(['file' => 'File tidak ditemukan di storage']);
        }

        // Kirim file ke Project B
        $response = Http::attach(
            'file', file_get_contents($filePath), basename($path)
        )->post('http://127.0.0.1:8000/api/upload-from-a');

        if ($response->successful()) {
            return redirect()->route('banners')->with('success', 'Berhasil menambahkan banner');
        } else {
            return redirect()->route('banners')->with('error', 'Banner gagal dikirim');
        }
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
        }
        $banner->save();

        return redirect()->route('banners')->with('success', 'Banner berhasil diperbarui.');
    }

    public function delete($id){
        if(Banner::count() <= 3){
            return redirect()->route('banners')->with('error','Tidak bisa menghapus. Banner sudah pada jumlah minimum.');
        }
        $banner = Banner::find($id);
        $banner->delete();
        Storage::disk('public')->delete($banner->img);
        return redirect()->route('banners')->with('success', 'Berhasil menghapus banner');
    }

}
