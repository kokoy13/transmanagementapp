<?php
namespace App\Http\Controllers;

use RouterOS\Client;
use RouterOS\Query;

class ApiMikrotikController extends Controller
{
    public function index()
    {
        return new Client([
            'host' => '192.168.10.1',
            'user' => 'admin',
            'pass' => '',
        ]);
    }

    public function getCustomer()
    {
        $client = $this->index();
        $query = new Query('/interface/print');
        $response = $client->query($query)->read();

        return $response; // array of interfaces
    }
}
