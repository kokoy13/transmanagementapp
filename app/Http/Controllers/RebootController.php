<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MikrotikApiService;

class RebootController extends Controller
{
    protected $mikrotik;

    public function __construct(MikrotikApiService $mikrotik) {
        $this->mikrotik = $mikrotik;
    }

    public function index()
    {
        return view('pages.reboot.index');
    }

    public function reboot(Request $request){
        $customerid = $request->customerid;

        $customers = $this->mikrotik->getSecret();
        $id = [];
        for($i = 0; $i < count($customers); $i++){
            $name = $customerid;
            if($customers[$i]['name'] == $name && $customers[$i]['disabled'] == 'false'){
                $id[] = $customers[$i]['.id'];
            }
        }
        if($id == null){
            return redirect()->route('reboot')->with('error','CustomerID '.$customerid.' tidak ditemukan atau dalam keadaan mati');
        }
        $this->mikrotik->disableSecret($id[0]);
        $this->mikrotik->enableSecret($id[0]);

        return redirect()->route('reboot')->with('success','Berhasil melakukan reboot');
    }
}
