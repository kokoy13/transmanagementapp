<?php

namespace App\Http\Controllers;
use App\Models\Zone;

use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $json = file_get_contents(public_path('js/map.json'));
        $zone = json_decode($json, true );
        $kecamatan = $zone['kecamatan'];

        return view('front.zone')->with(compact('kecamatan'));
    }

    public function checkZone(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
        ]);

        // Ambil kecamatan dari database
        $kecamatan = Zone::where('type', 'kecamatan')
                        ->where('nama', $validated['kecamatan'])
                        ->first();

        if (!$kecamatan) {
            return redirect()->back()->with('error','Zona belum tersedia');
        }

        // Cek apakah kelurahan berada di dalam kecamatan tersebut
        $kelurahan = Zone::where('type', 'kelurahan')
                        ->where('nama', $validated['kelurahan'])
                        ->where('parent_id', $kecamatan->id)
                        ->first();

        if (!$kelurahan) {
            return redirect()->back()->with('error','Kelurahan kamu belum tersedia');
        }

        // Jika valid, lanjutkan logika misalnya redirect atau return view
        return redirect()->back()->with('success', 'Zona tersedia, segera melakukan order untuk instalasi jaringan atau hubungi call center');
    }

}
