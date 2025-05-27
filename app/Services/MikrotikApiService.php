<?php

namespace App\Services;
use \RouterOS\Client;
use \RouterOS\Query;

class MikrotikApiService
{
    public function getData()
    {
        try {
        $client = new Client([
            'host' => '192.168.10.1',
            'user' => 'admin',
            'pass' => 'admin',
            'port' => 8730,
        ]);

        $query = new Query('/interface/print');
        $response = $client->query($query)->read();
        dd($response);
        } catch (\Exception $e) {
            dd("Error: " . $e->getMessage());
        }

    }

    public function getTraffic($interface = 'ether1')
    {
        $client = new Client([
            'host' => '192.168.10.1',
            'user' => 'admin',
            'pass' => 'admin',
            'port' => 8730
        ]);

        $query = new Query('/interface/monitor-traffic');
        $query->equal('interface', $interface)->equal('once', true); // 'once' penting agar tidak terus-menerus stream

        $response = $client->query($query)->read();

        return $response[0] ?? [];
    }
}
