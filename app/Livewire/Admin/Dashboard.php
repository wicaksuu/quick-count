<?php

namespace App\Livewire\Admin;

use App\Models\Calon;
use Livewire\Component;

class Dashboard extends Component
{
    public $presiden;
    public $dpr_ri;
    public $dpd_ri;
    public $dprd_provinsi;
    public $dprd;
    public $gubernur;
    public $bupati;

    public function load(){
        $this->presiden =  Calon::suaraTerbanyak('Presiden');
        $this->dpr_ri =  Calon::suaraTerbanyak('DPR RI');
        $this->dpd_ri =  Calon::suaraTerbanyak('DPD RI');
        $this->dprd_provinsi =  Calon::suaraTerbanyak('DPRD Provinsi');
        $this->dprd =  Calon::suaraTerbanyak('DPRD');
        $this->gubernur =  Calon::suaraTerbanyak('Gubernur');
        $this->bupati =  Calon::suaraTerbanyak('Bupati');
    }


    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
