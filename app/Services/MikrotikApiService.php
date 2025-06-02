<?php
namespace App\Services;

use RouterOS\Client;
use RouterOS\Query;
use Illuminate\Support\Facades\Log;

class MikrotikApiService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'host' => config('services.mikrotik.host'),
            'user' => config('services.mikrotik.user'),
            'pass' => config('services.mikrotik.pass'),
            'port' => (int) config('services.mikrotik.port'),
        ]);
    }

    public function getSecret(){
        try{
            $query = (new Query('/ppp/secret/print'));

            return $this->client->query($query)->read();
        }catch(\Exception $e){
            dd('Error: ' . $e->getMessage());
        }
    }

    public function enableSecret($id){
        try{
            $query = (new Query('/ppp/secret/enable'))
                ->equal('.id', $id);

            return $this->client->query($query)->read();
        }catch(\Exception $e){
            dd('Error: ' . $e->getMessage());
        }
    }

    public function disableSecret($id){
        try{
            $query = (new Query('/ppp/secret/disable'))
                ->equal('.id', $id);

            return $this->client->query($query)->read();
        }catch(\Exception $e){
            dd('Error: ' . $e->getMessage());
        }
    }

    public function createProfile($name, $limit)
    {
        try {
            $query = (new Query('/ppp/profile/add'))
                ->equal('name', $name)
                ->equal('local-address', '10.0.0.1')
                ->equal('remote-address', 'dhcp_pool0')
                ->equal('dns-server', '8.8.8.8')
                ->equal('rate-limit', $limit);

            return $this->client->query($query)->read();

        } catch (\Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }

    public function getTraffic($id)
    {
    try {
        $secretData = $this->getSecretById($id);
        if (empty($secretData)) {
            return ['error' => 'Interface not found'];
        }

        $secretName = $secretData[0]['name'] ?? null;

        if (!$secretName) {
            return ['error' => 'Interface name not found'];
        }
        $query = (new Query('/interface/monitor-traffic'))
            ->equal('interface', '<pppoe-'.$secretName.'>')
                ->equal('once', '');

            return $this->client->query($query)->read();
        } catch (\Exception $e) {
            Log::error('Mikrotik getTraffic error: ' . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }

    // public function getTraffic($id)
    // {
    //     $interfaceData = $this->getInterfaceById($id);
    //     // Ambil nama interface dari hasil array
    //     $interfaceName = $interfaceData[0]['name'] ?? null;

    //     if (!$interfaceName) {
    //         return ['error' => 'Interface not found'];
    //     }

    //     try {
    //         $query = (new Query('/interface/monitor-traffic'))
    //             ->equal('interface', $interfaceName)
    //             ->equal('once', '');

    //         return $this->client->query($query)->read();
    //     } catch (\Exception $e) {
    //         dd("Error: " . $e->getMessage());
    //     }
    // }

    public function getInterfaces(){
        try{
            $query = (new Query('/interface/print'))
                ->equal('.proplist','.id,name,disabled');

            return $this->client->query($query)->read();
        }catch(\Exception $e){
            dd("Error: " . $e->getMessage());
        }
    }

    public function getInterfaceById($id){
        try {
        $query = (new Query('/interface/print'))
                    ->where('.id', $id)
                    ->equal('.proplist','.id,name');

        return $this->client->query($query)->read();
        } catch (\Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }

    public function getSecretById($id){
        try{
            $query = (new Query('/ppp/secret/print'))
                ->where('.id', $id)
                ->equal('.proplist', '.id,name');
            return $this->client->query($query)->read();
        }catch(\Exception $e){
            dd("Error: " . $e->getMessage());
        }
    }
}
