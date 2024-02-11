<?php

namespace App\Livewire\Admin\Pileg;

use App\Models\dapilDPRD;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use Livewire\Component;

class SelectDapilKecDesa extends Component
{
    public $dapils=[],$pilihDapil;
    public $kecamatans=[],$pilihKecamatan;
    public $desas=[],$pilihDesa;
    public $tpss=[],$pilihtps;
    public $type,$key;

    public function mount($type,$key){
        $this->type = $type;
        $this->key = $key;
    }

    public function load(){
        $this->dapils = dapilDPRD::get();
    }

    public function GetDataDapil(){
        if ($this->pilihDapil) {
            $dapil = dapilDPRD::find($this->pilihDapil);
            $this->kecamatans = $dapil->kecamatans;
            $this->dispatch('GetDapil',dapil_id: $this->pilihDapil);
        }
    }
    public function GetDataKecamatan(){
        if ($this->pilihKecamatan) {
            $kecamatan = kecamatan::find($this->pilihKecamatan);
            $this->desas = $kecamatan->desas;
            $this->dispatch('GetKecamatan',kecamatan_id: $this->pilihKecamatan);
        }
    }
    public function GetDataDesa(){
        if ($this->pilihDesa) {
            $desa = desa::with('tpss')->find($this->pilihDesa);
            $this->tpss = $desa->tpss;
            $this->dispatch('GetDesa',desa_id: $this->pilihDesa);

        }
    }
    public function GetDataTps(){
        if ($this->pilihtps) {
            $this->dispatch('GetTps',tps_id: $this->pilihtps);
        }
    }

    public function render()
    {
        $this->load();
        return view('livewire.admin.pileg.select-dapil-kec-desa');
    }
}
