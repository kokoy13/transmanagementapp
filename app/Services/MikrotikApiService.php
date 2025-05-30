<?php

namespace App\Services;
use \RouterOS\Client;
use \RouterOS\Query;

class MikrotikApiService
{
    public function createProfile($name, $limit){
        try {
        $client = new Client([
            'host' => '192.168.10.1',
            'user' => 'admin',
            'pass' => '',
            'port' => 8728,
        ]);

        $query = new Query('/ppp/profile/add');

        $query->equal('name', $name)
            ->equal('local-address', '10.0.0.1')
            ->equal('remote-address', 'dhcp_pool0')
            ->equal('dns-server', '8.8.8.8')
            ->equal('rate-limit', $limit);

        $response = $client->query($query)->read();

        return $response;

        } catch (\Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }

    public function getService(){
        try {
        $client = new Client([
            'host' => '192.168.10.1',
            'user' => 'admin',
            'pass' => '',
            'port' => 8728,
        ]);

        $query = new Query('/ppp/profile/print');
        $response = $client->query($query)->read();

        return $response;
        } catch (\Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }

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
