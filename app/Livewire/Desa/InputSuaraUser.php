<?php

namespace App\Livewire\Desa;

use App\Models\Calon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\DaftarPartai;
use App\Models\Setting;
use App\Models\tps;
use App\Models\User;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class InputSuaraUser extends Component
{
    use WithFileUploads;

    public $partai ;
    public $tps ;
    public $calons;

    public $kehadiran=0,$desa,$kecamatan,$SelectPartai,$SelectTPS,$TotalSuara,$part,$dataTPS,$setting,$set,$collor,$pemilu,$ModalIsOpen=false,$verifikasi=true,$logo;

    protected $listeners = ['suaraUpdated'];
    public function suaraUpdated()
    {
        $this->load();
    }

    public function updateSelect($set){
        if ($set == 'Replace') {
            $this->set = null;
        }else{
            $this->set = $set;
        }
    }
    public function Verifikasi(){
        try {
            $calons = $this->calons;
            foreach ($calons as $calon) {
                $calon->lock = true;
                $calon->save();
            }
            Toaster::success('Berhasil melakukan verifikasi.');
            $this->load();
            $this->ModalIsOpen = false;
        } catch (\Throwable $th) {
            Toaster::error($th->getMessage());
        }
    }

    public function OpenModal(){
        $this->ModalIsOpen = true;
    }

    public function CloseModal(){
        $this->ModalIsOpen = false;
    }
    public function updateKehadiran(){
        try {
            $tps = tps::find($this->tps->id);
            $tps->kehadiran = $this->kehadiran;
            $tps->save();
            Toaster::success('Berhasil melakukan update kehadiran.');
            $this->load();
        } catch (\Throwable $th) {
            Toaster::error($th->getMessage());
        }
    }
    public function load(){

        $setting    = Setting::where('key', 'type')->where('status',true)->get();
        $user       = User::with('tps')->find(Auth::user()->id);
        $desa       = $user->tps->desa;
        $kecamatan  = $user->tps->kecamatan;
        $partai     = DaftarPartai::get();
        $tps        = $user->tps;

        $SelectPartai = null;
        $SelectTPS = null;
        $part = null;
        $TotalSuara=0;
        if ($this->SelectTPS == null) {
            $this->SelectTPS = $tps->id;
        }
        if ($this->SelectPartai == null) {
            $sel = null;
            foreach ($partai as $value) {
                if ($value->nama == 'Partai Demokrasi Indonesia Perjuangan') {
                    $sel = $value->id;
                }
            }
            if ($sel == null) {
                $this->SelectPartai = $partai[0]->id;
            }else {
                $this->SelectPartai = $sel;
            }
        }
        $type = $this->set;
        $pemilu = null;
        switch ($type) {
            case 'Presiden':
                $pemilu = 'Pilkada';
                break;
            case 'DPR RI':
                $pemilu = 'Pileg';
                break;
            case 'DPD RI':
                $pemilu = 'Pileg';
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
        if ($pemilu) {
            if ($pemilu == 'Pileg') {
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
            }else{
                if ($this->SelectTPS != null) {
                    $SelectTPS      = $this->SelectTPS;
                    $calons         = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$SelectTPS)->get();
                    $TotalSuara     = Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$SelectTPS)->sum('suara');
                }
            }
        }
        $modal = $this->ModalIsOpen;
        $this->reset();
        $this->kehadiran=$tps->kehadiran;
        $this->ModalIsOpen=$modal;
        $this->pemilu=$pemilu;
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

        if ($pemilu) {
            $this->calons = $calons;
        }
        $this->part = $part;
        if (isset($calons[0]->lock)) {
            if ($calons[0]->lock == true) {
                $this->verifikasi = false;
            }
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
        return view('livewire.desa.input-suara-user');
    }
}
