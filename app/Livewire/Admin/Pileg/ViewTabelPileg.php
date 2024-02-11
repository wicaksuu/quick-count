<?php

namespace App\Livewire\Admin\Pileg;

use App\Models\Calon;
use App\Models\DaftarPartai;
use App\Models\dapilDPRD;
use App\Models\tps;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use Livewire\Component;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;

class ViewTabelPileg extends Component
{
    public $calons = [];
    public $type,
        $key,
        $partai_id = null,
        $dapil_id = null,
        $kecamatan_id = null,
        $desa_id = null,
        $tps_id = null;

    #[On('GetDapil')]
    public function GetDapil($dapil_id)
    {
        if ($dapil_id) {
            $dapil = dapilDPRD::find($dapil_id);
            $this->dapil_id = $dapil_id;
            $calon['data'] = Calon::getSuara($this->type, $this->dapil_id, $this->kecamatan_id, $this->desa_id, $this->tps_id, $this->partai_id, 100, 1);
            $calon['type'] = $this->type;
            $calon['key'] = $this->key;
            $this->dispatch('update', json_encode($calon));
            Toaster::success('Berhasil memilih dapil ' . $dapil->nama);
        }
    }

    #[On('GetPartai')]
    public function GetPartai($partai_id)
    {
        if ($partai_id) {
            $partai = DaftarPartai::find($partai_id);
            $this->partai_id = $partai_id;
            $calon['data'] = Calon::getSuara($this->type, $this->dapil_id, $this->kecamatan_id, $this->desa_id, $this->tps_id, $this->partai_id, 100, 1);
            $calon['type'] = $this->type;
            $calon['key'] = $this->key;
            $this->dispatch('update', json_encode($calon));
            Toaster::success('Berhasil memilih partai ' . $partai->nama);
        }
    }

    #[On('GetKecamatan')]
    public function GetKecamatan($kecamatan_id)
    {
        if ($kecamatan_id) {
            $kecamatan = kecamatan::find($kecamatan_id);
            $this->kecamatan_id = $kecamatan_id;
            $calon['data'] = Calon::getSuara($this->type, $this->dapil_id, $this->kecamatan_id, $this->desa_id, $this->tps_id, $this->partai_id, 100, 1);
            $calon['type'] = $this->type;
            $calon['key'] = $this->key;
            $this->dispatch('update', json_encode($calon));
            Toaster::success('Berhasil memilih kecamatan ' . $kecamatan->nama);
        }
    }

    #[On('GetDesa')]
    public function GetDesa($desa_id)
    {
        if ($desa_id) {
            $desa = desa::find($desa_id);
            $this->desa_id = $desa_id;
            $calon['data'] = Calon::getSuara($this->type, $this->dapil_id, $this->kecamatan_id, $this->desa_id, $this->tps_id, $this->partai_id, 100, 1);
            $calon['type'] = $this->type;
            $calon['key'] = $this->key;
            $this->dispatch('update', json_encode($calon));
            Toaster::success('Berhasil memilih desa ' . $desa->nama);
        }
    }

    #[On('GetTps')]
    public function GetTps($tps_id)
    {
        if ($tps_id) {
            $tps = tps::find($tps_id);
            $this->tps_id = $tps_id;
            $calon['data'] = Calon::getSuara($this->type, $this->dapil_id, $this->kecamatan_id, $this->desa_id, $this->tps_id, $this->partai_id, 100, 1);
            $calon['type'] = $this->type;
            $calon['key'] = $this->key;
            $this->dispatch('update', json_encode($calon));
            Toaster::success('Berhasil memilih tps ' . $tps->nama);
        }
    }

    #[On('updateDataFilter')]
    public function updateDataFilter()
    {
        $calon['data'] = Calon::getSuara($this->type, $this->dapil_id, $this->kecamatan_id, $this->desa_id, $this->tps_id, $this->partai_id, 100, 1);
        $calon['type'] = $this->type;
        $calon['key'] = $this->key;
        $this->dispatch('update', json_encode($calon));
    }

    public function mount($type, $key)
    {
        $this->type = $type;
        $this->key = $key;
    }

    public function render()
    {
        return view('livewire.admin.pileg.view-tabel-pileg');
    }
}
