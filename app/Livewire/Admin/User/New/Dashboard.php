<?php

namespace App\Livewire\Admin\User\New;

use App\Models\DaftarPartai;
use App\Models\Setting;
use App\Models\tps;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $setting,$SelectTPS,$SelectPartai,$pemilu,$set,$tps,$logo,$collor,$partai,$dataTPS,$kecamatan,$desa;

    public function load(){

        $this->setting    = Setting::where('key', 'type')->where('status',true)->get();
        $desa_id    = Auth::user()->current_team_id;
        $this->desa       = desa::find($desa_id);
        $this->kecamatan  = kecamatan::find($this->desa->kecamatan_id);
        $partai     = DaftarPartai::get();
        $tps        = tps::where('desa_id',$desa_id)->get();

        $SelectPartai = null;
        $SelectTPS = null;
        $part = null;
        $TotalSuara=0;
        
        if ($this->SelectTPS == null) {
            $this->SelectTPS = $tps[0]->id;
        }
        if ($this->SelectPartai == null) {
            $this->SelectPartai = $partai[0]->id;
        }
        if ($this->set == null) {
            $type = Setting::where('key', 'type')->where('status',true)->first()->nama;
        }else {
            $type = $this->set;
        }

        switch ($type) {
            case 'Presiden':
                $pemilu = 'Pilkada';
                break;
            case 'DPR RI':
                $pemilu = 'Pileg';
                break;
            case 'DPD RI':
                $pemilu = 'Pilkada';
                break;
            case 'DPRD Provinsi':
                $pemilu = 'Pileg';
                break;
            case 'DPRD':
                $pemilu = 'Pileg';
                break;
            case 'Gubernur':
                $pemilu = 'Pilkada';
                break;
            case 'Bupati':
                $pemilu = 'Pilkada';
                break;
            case 'Walikota':
                $pemilu = 'Pilkada';
                break;
        }
        
        switch ($type) {
            case 'Presiden':
                $this->logo ="indonesia.svg";
                $this->collor = 'bg-gray-700';
                break;
            case 'DPR RI':
                $this->logo ="indonesia.svg";
                $this->collor = 'bg-yellow-500';
                break;
            case 'DPD RI':
                $this->logo ="indonesia.svg";
                $this->collor = 'bg-red-500';
                break;
            case 'DPRD Provinsi':
                $this->logo ="indonesia.svg";
                $this->collor = 'bg-blue-500';
                break;
            case 'DPRD':
                $this->collor = 'bg-green-500';
                break;
            case 'Gubernur':
                $this->logo ="indonesia.svg";
                $this->collor = 'bg-blue-500';
                break;
            case 'Bupati':
                $this->logo ="indonesia.svg";
                $this->collor = 'bg-blue-500';
                break;
            case 'Walikota':
                $this->logo ="indonesia.svg";
                $this->collor = 'bg-blue-500';
                break;
        }
        $this->dataTPS = tps::find($SelectTPS);
        dd($SelectTPS);
        $this->set=$type;
        $this->pemilu = $pemilu;
        $this->tps = $tps;
        $this->partai = $partai;
    }

    public function UpdateSuara(){

        $this->load();
    }
    public function updateSelectPartai(){

        $this->load();
    }
    public function updateSelectTPS(){

        $this->load();
    }
    public function render()
    {
        $this->load();
        return view('livewire.admin.user.new.dashboard');
    }
}
