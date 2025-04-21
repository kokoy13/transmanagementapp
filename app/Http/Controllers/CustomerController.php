<?php

namespace App\Http\Controllers;

use RouterOS\Query;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiMikrotikController;

class CustomerController extends Controller
{
    public function getCustomer(){
        $apiMikrotikController = new ApiMikrotikController();

        $client = $apiMikrotikController->index();

        $query = new Query('/interface/print');
        $response = $client->query($query)->read();

        return $response;
    }
}
