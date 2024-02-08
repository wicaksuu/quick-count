<?php

namespace App\Http\Controllers;

use App\Models\DaftarPartai;
use App\Models\wilayah\desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\tps;
use App\Models\wilayah\kecamatan;

class RouteController extends Controller
{
    public function settingDPRD()
    {
        return view('admin.dprd.setting');
    }

    public function settingTps()
    {
        return view('admin.setting.tps');
    }
    public function settingPartai()
    {
        return view('admin.setting.partai');
    }
    public function dashboard(){

        switch (Auth::user()->role) {
            case 'admin':
                return view('admin.dashboard');
                break;

            case 'desa':
                $desa_id = Auth::user()->current_team_id;
                $desa = desa::find($desa_id);
                $kecamatan = kecamatan::find($desa->kecamatan_id);
                $data = [
                    'kecamatan'=>$kecamatan,
                    'desa'=>$desa,

                ];
                return view('desa.dashboard',$data);
                break;

        }
    }

    public function settingCalon($id)
    {
        switch (Route::currentRouteName()) {
            case 'setting-calon-presiden':
                $data = 'Presiden';
                $type = 'Pilkada';
                break;
            case 'setting-calon-dpr-ri':
                $data = 'DPR RI';
                $type = 'Pileg';
                break;
            case 'setting-calon-dpd-ri':
                $data = 'DPD RI';
                $type = 'Pileg';
                break;
            case 'setting-calon-dprd-provinsi':
                $data = 'DPRD Provinsi';
                $type = 'Pileg';
                break;
            case 'setting-calon-dprd':
                $data = 'DPRD';
                $type = 'Pileg';
                break;
            case 'setting-calon-gubernur':
                $data = 'Gubernur';
                $type = 'Pilkada';
                break;
            case 'setting-calon-bupati':
                $data = 'Bupati';
                $type = 'Pilkada';
                break;
            case 'setting-calon-walikota':
                $data = 'Walikota';
                $type = 'Pilkada';
                break;
        }
        if ($type == 'Pileg') {
            $partai = DaftarPartai::find($id);
            return view('admin.dprd.calon-partai', ['partai' => $partai, 'type' => $data]);
        }else{
            return view('admin.pilkada.pilkada', ['type' => $data]);
        }
    }

    public function settingGlobal()
    {
        return view('admin.setting.global');
    }
}
