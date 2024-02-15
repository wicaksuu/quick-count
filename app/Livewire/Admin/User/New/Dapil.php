<?php

namespace App\Livewire\Admin\User\New;

use App\Models\Calon;
use App\Models\DaftarPartai;
use Livewire\Component;

class Dapil extends Component
{
    public $dapil,$suara=[],$update,$time,$partai=[],$SelectPartai;

    public function loadDprd(){
        $dapil = $this->dapil;
        $SelectPartai = $this->SelectPartai;
        $this->reset();
        $this->SelectPartai = $SelectPartai;
        $this->dapil = $dapil;
        $this->partai = DaftarPartai::get();
        $this->update = Calon::orderBy('updated_at','desc')->where('type','DPRD')->first()->updated_at->diffForHumans();
        if ($SelectPartai == null) {
            $suara = Calon::suaraTerbanyakDapilDPRDAll('DPRD',$this->dapil->id,null);
        }else{
            $suara = Calon::suaraTerbanyakDapilDPRDAll('DPRD',$this->dapil->id,$this->SelectPartai);
        }
        $this->suara = $suara;

    }
    public function updateSelectPartai(){
        $this->loadDprd();
    }
    public function mount($dapil){
        $this->dapil = $dapil;
    }
    public function render()
    {
        return view('livewire.admin.user.new.dapil');
    }
}
