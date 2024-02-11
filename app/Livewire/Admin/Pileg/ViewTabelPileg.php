<?php

namespace App\Livewire\Admin\Pileg;

use App\Models\Calon;
use App\Models\wilayah\kecamatan;
use Livewire\Component;
use Livewire\Attributes\On;

class ViewTabelPileg extends Component
{
    public $calons=[];
    public $type,$key,$dapil_id,$kecamatan_id,$desa_id;

    #[On('GetDapil')]
    public function GetDapil($dapil_id){
        $this->dapil_id = $dapil_id;
        $calon['data'] = Calon::getSuara( $this->type,$dapil_id);
        $calon['key'] = $this->key;
        $this->dispatch('update', json_encode($calon));
    }

    #[On('GetKecamatan')]
    public function GetKecamatan($kecamatan_id){
        $this->kecamatan_id = $kecamatan_id;
        $calon['data'] = Calon::getSuara( $this->type,null,$this->kecamatan_id,null,null,10,1);
        $calon['key'] = $this->key;
        $this->dispatch('update', json_encode($calon));
    }

    #[On('GetDesa')]
    public function GetDesa($desa_id){
        $this->desa_id = $desa_id;
    }

    public function mount($type,$key){
        $this->type = $type;
        $this->key = $key;
    }

    public function render()
    {
        return view('livewire.admin.pileg.view-tabel-pileg');
    }
}
