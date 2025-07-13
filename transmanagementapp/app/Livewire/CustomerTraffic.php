<?php
namespace App\Livewire;

use Livewire\Component;

class CustomerTraffic extends Component
{
    public $datas = [];
    public $usage = [];

    public function fetchData()
    {
        $mikrotik = app('App\Services\MikrotikApiService');
        $state = $mikrotik->getStateCustomer();
        $datas = $mikrotik->getSecret();

        $secrets = [];
        foreach ($datas as $data) {
            foreach ($state as $st) {
                if ($data['name'] == $st['user'] && $st['running'] == 'true') {
                    $secrets[] = $data;
                }
            }
        }

        $usage = [];
        foreach ($secrets as $secret) {
            $usage[] = $mikrotik->getTrafficById($secret['.id']);
        }

        $this->datas = $datas;
        $this->usage = $usage;
    }

    public function render()
    {
        $this->fetchData();
        return view('livewire.customer-traffic');
    }
}
