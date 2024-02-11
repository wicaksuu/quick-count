<?php

namespace App\Http\Controllers;

use App\Models\DaftarPartai;
use App\Models\dapilDPRD;
use App\Models\wilayah\desa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    public function daftarTps()
    {
        return view('admin.setting.daftarTps');
    }
    public function settingPartai()
    {
        return view('admin.setting.partai');
    }
    public function dashboard()
    {
        switch (Auth::user()->role) {
            case 'admin':
                $dapils = dapilDPRD::get();
                return view('admin.dashboard', ['dapils' => $dapils]);
                break;

            case 'desa':
                $desa_id = Auth::user()->current_team_id;
                $desa = desa::find($desa_id);
                $kecamatan = kecamatan::find($desa->kecamatan_id);
                $data = [
                    'kecamatan' => $kecamatan,
                    'desa' => $desa,
                ];
                return view('desa.dashboard', $data);
                break;

            case 'user':
                $user = User::with('tps')->find(Auth::user()->id);
                $data = [
                    'kecamatan' => $user->tps->kecamatan,
                    'desa' => $user->tps->desa,
                    'tps' => $user->tps,
                ];
                return view('user.dashboard', $data);
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
                $type = 'Pilkada';
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
        } else {
            return view('admin.pilkada.pilkada', ['type' => $data]);
        }
    }

    public function Overview($id)
    {
        switch ($id) {
            case 'presiden':
                $data = 'Presiden';
                $type = 'Pilkada';
                break;
            case 'dpr-ri':
                $data = 'DPR RI';
                $type = 'Pileg';
                break;
            case 'dpd-ri':
                $data = 'DPD RI';
                $type = 'Pilkada';
                break;
            case 'dprd-provinsi':
                $data = 'DPRD Provinsi';
                $type = 'Pileg';
                break;
            case 'dprd':
                $data = 'DPRD';
                $type = 'Pileg';
                break;
            case 'gubernur':
                $data = 'Gubernur';
                $type = 'Pilkada';
                break;
            case 'bupati':
                $data = 'Bupati';
                $type = 'Pilkada';
                break;
            case 'walikota':
                $data = 'Walikota';
                $type = 'Pilkada';
                break;

            default:
                return back();
                break;
        }
        if ($type == 'Pileg') {
            return view('admin.overview-pileg', ['data' => $data, 'type' => $type ,'key'=>$id]);
        } else {
            return view('admin.overview-pileg', ['data' => $data, 'type' => $type ,'key'=>$id]);
        }
    }

    public function settingGlobal()
    {
        return view('admin.setting.global');
    }
}
