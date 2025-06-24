<?php

namespace App\Http\Controllers;
use App\Models\Zone;

use Illuminate\Http\Request;
use App\Services\ZoneCheckerService;
use App\Http\Requests\CheckZoneRequest;

class ZoneController extends Controller
{
    public function __construct(protected ZoneCheckerService $zoneCheckerService) {}

    public function index()
    {
        $kecamatan = $this->zoneCheckerService->getKecamatanFromJson();
        return view('front.zone', compact('kecamatan'));
    }

    public function checkZone(CheckZoneRequest $request)
    {
        $result = $this->zoneCheckerService->check(
            $request->input('kecamatan'),
            $request->input('kelurahan')
        );

        if (!$result['status']) {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->back()->with('success', 'Zona tersedia, segera melakukan order untuk instalasi jaringan atau hubungi call center');
    }

}
