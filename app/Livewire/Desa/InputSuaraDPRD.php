<?php

namespace App\Livewire\Desa;

use App\Models\Calon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use App\Models\DaftarPartai;
use App\Models\Setting;
use App\Models\tps;
use Livewire\WithFileUploads;

class InputSuaraDPRD extends Component
{
    use WithFileUploads;

    public $partai = [];
    public $tps = [];
    public $calons;

    public $desa,$kecamatan,$SelectPartai,$SelectTPS,$TotalSuara,$part,$dataTPS,$setting,$set,$collor;

    protected $listeners = ['suaraUpdated'];
    public function suaraUpdated()
    {
        $this->load();
    }

    public function export(){

        $data = [
            'title' => 'Contoh Export PDF dengan Laravel',
            'content' => 'Ini adalah contoh konten untuk PDF.'
        ];

    }

    public function load(){

        $setting    = Setting::where('key', 'type')->where('status',true)->get();
        $desa_id    = Auth::user()->current_team_id;
        $desa       = desa::find($desa_id);
        $kecamatan  = kecamatan::find($desa->kecamatan_id);
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

        if ($this->SelectPartai != null) {
            $SelectPartai   = $this->SelectPartai;
            $calons         = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('partai_id',$SelectPartai)->with('partai','dapil')->get();
            $TotalSuara     = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('partai_id',$SelectPartai)->sum('suara');
            if (isset($calons[0])) {
                $part           = $calons[0]->partai;
            }
        }
        if ($this->SelectTPS != null) {
            $SelectTPS      = $this->SelectTPS;
            $calons         = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$SelectTPS)->with('partai','dapil')->get();
            $TotalSuara     = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$SelectTPS)->sum('suara');
        }

        if ($this->SelectPartai != null && $this->SelectTPS != null) {
            $calons         = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$SelectTPS)->where('partai_id',$SelectPartai)->with('partai','dapil')->get();
            $TotalSuara     = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$SelectTPS)->where('partai_id',$SelectPartai)->sum('suara');
        }

        $this->reset();
        $this->set=$type;
        $this->setting=$setting;
        $this->TotalSuara=$TotalSuara;
        $this->dataTPS = tps::find($SelectTPS);
        $this->desa = $desa;
        $this->kecamatan = $kecamatan;
        $this->partai = $partai;
        $this->tps = $tps;
        $this->SelectPartai = $SelectPartai;
        $this->SelectTPS = $SelectTPS;
        $this->calons = $calons;
        $this->part = $part;
        switch ($type) {
            case 'Presiden':
                $this->collor = 'bg-grey-500';
                break;
            case 'DPR RI':
                $this->collor = 'bg-yellow-500';
                break;
            case 'DPD RI':
                $this->collor = 'bg-red-500';
                break;
            case 'DPRD Provinsi':
                $this->collor = 'bg-blue-500';
                break;
            case 'DPRD':
                $this->collor = 'bg-green-500';
                break;
            case 'Gubernur':
                $this->collor = 'bg-blue-500';
                break;
            case 'Bupati':
                $this->collor = 'bg-blue-500';
                break;
            case 'Walikota':
                $this->collor = 'bg-blue-500';
                break;
        }
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
        return view('livewire.desa.input-suara-d-p-r-d');
    }
}
