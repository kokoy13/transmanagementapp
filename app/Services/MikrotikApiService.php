<?php

namespace App\Services;
use \RouterOS\Client;
use \RouterOS\Query;

class MikrotikApiService
{
    public function getData()
    {
        $client = new Client([
            'host' => '192.168.1.3',
            'user' => 'admin',
            'pass' => ''
        ]);

        // Send "equal" query with details about IP address which should be created
        $query =
            (new Query('/ip/print'));

        // Send query and read response from RouterOS (ordinary answer from update/create/delete queries has empty body)
        $response = $client->query($query)->read();

        dd($response);
    }
}
