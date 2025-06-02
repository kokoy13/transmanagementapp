<?php

namespace App\Http\Controllers;

use App\Services\MikrotikApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class MonitoringController extends Controller
{

    protected $mikrotik;

    public function __construct(MikrotikApiService $mikrotik) {
        $this->mikrotik = $mikrotik;
    }

    public function index(){
        //Untuk Menampilkan data secret yang tidak ada trafficnya
        $data = $this->mikrotik->getSecret();

        //Untuk Menampilkan data interface dengan tujuan mendapatkan traffic
        // $data = $this->mikrotik->getInterfaces();
        return view('pages.monitoring.tx-rx.index')->with(compact('data'));
    }

    public function traffic($id){
        $data = $this->mikrotik->getSecretById($id);
        return view('pages.monitoring.tx-rx.traffic', ['data' => $data[0]]);
    }

    // public function getTxRx($id){
    //     $result = $this->mikrotik->getTraffic($id);
    //     $data = $result[0] ?? [];
    //     return response()->json([
    //         'rx' => (int) $data['rx-bits-per-second'] ?? 0,
    //         'tx' => (int) $data['tx-bits-per-second'] ?? 0,
    //         'time' => now()->format('H:i:s')
    //     ]);
    // }

    public function getTxRx($id)
    {
        try {
            $result = $this->mikrotik->getTraffic($id);

            if (isset($result['error'])) {
                return response()->json(['error' => $result['error']], 404);
            }

            $data = $result[0] ?? [];
            return response()->json([
                'rx' => (int) ($data['rx-bits-per-second'] ?? 0),
                'tx' => (int) ($data['tx-bits-per-second'] ?? 0),
                'time' => now()->format('H:i:s'),
                'interface_id' => $id
            ]);
        } catch (\Exception $e) {
            Log::error('Mikrotik traffic error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch traffic data'], 500);
        }
    }

    // public function getTxRx($id){
    //     return response()->json(['id_diterima' => $id, 'mikrotik' => isset($this->mikrotik)]);
    // }


    public function getActiveConnection(){
        return view('pages.monitoring.active-connection.index');
    }
}
