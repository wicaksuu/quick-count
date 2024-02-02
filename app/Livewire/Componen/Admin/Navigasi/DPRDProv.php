<?php

namespace App\Livewire\Componen\Admin\Navigasi;

use App\Models\DaftarPartai;
use Livewire\Component;

class DPRDProv extends Component
{

    public $partais=[];

    public function mount($partais)
    {
        $this->partais = $partais;
    }
    public function render()
    {
        return view('livewire.componen.admin.navigasi.d-p-r-d-prov');
    }
}