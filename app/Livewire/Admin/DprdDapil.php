<?php

namespace App\Livewire\Admin;

use App\Models\Calon;
use App\Models\dapilDPRD;
use Livewire\Component;

class DprdDapil extends Component
{
    public $suaras=[];

    public function load(){
        $dapils = dapilDPRD::get();
        foreach ($dapils as $dapil) {
            $suaras[] = [
                    'calon'=>Calon::suaraTerbanyakDapilDPRD('DPRD',$dapil->id,$dapil->kursi),
                    'dapil'=>$dapil
                ];
        }
        $this->suaras = $suaras;
    }
    public function render()
    {
        return view('livewire.admin.dprd-dapil');
    }
}
