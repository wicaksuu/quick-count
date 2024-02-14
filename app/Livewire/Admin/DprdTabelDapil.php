<?php

namespace App\Livewire\Admin;

use App\Models\Calon;
use Livewire\Component;

class DprdTabelDapil extends Component
{
    public $dapil,$suara=[],$update,$time;

    public function loadDprd(){
        $dapil = $this->dapil;
        $this->reset();
        $this->dapil = $dapil;
        $suara = Calon::suaraTerbanyakDapilDPRD('DPRD',$this->dapil->id,$this->dapil->kursi);
        $this->suara = $suara;
        $this->update = Calon::orderBy('updated_at','desc')->first()->updated_at->diffForHumans();
        // $this->time = $this->update->diffForHumans();
    }
    public function mount($dapil){
        $this->dapil = $dapil;
    }
    public function render()
    {
        return view('livewire.admin.dprd-tabel-dapil');
    }
}
