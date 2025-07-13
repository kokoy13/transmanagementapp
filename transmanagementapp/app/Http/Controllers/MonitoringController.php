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

    // public function index(){
    //     $state = $this->mikrotik->getStateCustomer();
    //     $secrets = [];
    //     $datas = $this->mikrotik->getSecret();
    //     //Dapatkan secret dengan status running
    //     foreach($datas as $data){
    //         foreach($state as $st){
    //             if($data['name'] == $st['user'] && $st['running'] == 'true'){
    //                 $secrets[] = $data;
    //             }
    //         }
    //     }

    //     $usage = [];
    //     //Dapatkan tx rx dari secret
    //     foreach($secrets as $secret){
    //         $usage[] = $this->mikrotik->getTrafficById($secret['.id']);
    //     }
    //     // $usage = $this->mikrotik->getUsage();
    //     return view('pages.monitoring.tx-rx.index')->with(compact('datas', 'usage'));
    // }

    public function traffic($id){
        $data = $this->mikrotik->getSecretById($id);
        return view('pages.monitoring.tx-rx.traffic', ['data' => $data[0]]);
    }

    public function getTxRx($id)
    {
        try {
            $result = $this->mikrotik->getTrafficById($id);
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

}
