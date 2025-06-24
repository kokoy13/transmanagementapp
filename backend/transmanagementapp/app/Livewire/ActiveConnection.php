<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\MikrotikApiService;

class ActiveConnection extends Component
{
    public $data = [];

    public function mount(MikrotikApiService $mikrotik)
    {
        $this->data = $mikrotik->getActiveConnection();
    }

    public function loadData(MikrotikApiService $mikrotik)
    {
        $this->data = $mikrotik->getActiveConnection();
    }

    public function render()
    {
        return view('livewire.active-connection');
    }
}
