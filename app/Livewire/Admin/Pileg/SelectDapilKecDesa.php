<?php

namespace App\Livewire\Admin\Pileg;

use App\Models\DaftarPartai;
use App\Models\dapilDPRD;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use Livewire\Component;

class SelectDapilKecDesa extends Component
{
    public $partais=[],$pilihPartai;
    public $dapils=[],$pilihDapil;
    public $kecamatans=[],$pilihKecamatan;
    public $desas=[],$pilihDesa;
    public $tpss=[],$pilihtps;
    public $type,$key;

    public function mount($type,$key){
        $this->reset();
        $this->type = $type;
        $this->key = $key;
    }

    public function load(){
        if ($this->type == 'DPRD') {
            $this->dapils = dapilDPRD::get();
        }
        // dd($this->key);
        if ($this->key == 'Pileg') {
            $this->partais = DaftarPartai::get();
            $this->kecamatans = kecamatan::where('kota_id',3519)->get();
        }else{
            $this->kecamatans = kecamatan::where('kota_id',3519)->get();
        }

    }

    public function GetDataPartai(){
        if ($this->pilihPartai) {
            $this->dispatch('GetPartai',partai_id: $this->pilihPartai);
        }
    }

    public function GetDataDapil(){
        if ($this->pilihDapil) {
            $dapil = dapilDPRD::find($this->pilihDapil);
            $this->kecamatans = $dapil->kecamatans;
            $this->dispatch('GetDapil',dapil_id: $this->pilihDapil);
            $this->pilihKecamatan=null;
        }
    }
    public function GetDataKecamatan(){
        if ($this->pilihKecamatan) {
            $kecamatan = kecamatan::find($this->pilihKecamatan);
            $this->desas = $kecamatan->desas;
            $this->dispatch('GetKecamatan',kecamatan_id: $this->pilihKecamatan);
            $this->pilihDesa=null;
        }
    }
    public function GetDataDesa(){
        if ($this->pilihDesa) {
            $desa = desa::with('tpss')->find($this->pilihDesa);
            $this->tpss = $desa->tpss;
            $this->dispatch('GetDesa',desa_id: $this->pilihDesa);
            $this->pilihtps=null;

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
