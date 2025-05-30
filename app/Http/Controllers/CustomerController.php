<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Services\MikrotikApiService;

class CustomerController extends Controller
{
    protected $mikrotik;

    public function __construct(MikrotikApiService $mikrotik) {
        $this->mikrotik = $mikrotik;
    }

    public function index()
    {
        $customers = $this->mikrotik->getSecret();
        return view('pages.customer.index', compact('customers'));
    }

        public function action(Request $request){
            if($request->action == 'enable'){
                for($id = 0; $id < count($request->selected_ids); $id++){
                    $this->mikrotik->enableSecret($request->selected_ids[$id]);
                }
            }else if($request->action == 'disable'){
                for($id = 0; $id < count($request->selected_ids); $id++){
                    $this->mikrotik->disableSecret($request->selected_ids[$id]);
                }
            }else{
                return redirect()->route('customers');
            }

            return redirect()->route('customers');
        }
}
