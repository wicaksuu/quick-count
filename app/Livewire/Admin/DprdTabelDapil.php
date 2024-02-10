<?php

namespace App\Livewire\Admin;

use App\Models\Calon;
use Livewire\Component;

class DprdTabelDapil extends Component
{
    public $dapil,$suara=[];

    public function load(){
        $dapil = $this->dapil;
        $this->reset();
        $this->dapil = $dapil;
        $suara = Calon::suaraTerbanyakDapilDPRD('DPRD',$this->dapil->id,$this->dapil->kursi);
        $this->suara = $suara;
    }
    public function mount($dapil){
        $this->dapil = $dapil;
    }
    public function render()
    {
        $this->load();
        return view('livewire.admin.dprd-tabel-dapil');
    }
}
