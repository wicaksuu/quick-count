<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\DaftarPartai;
use App\Models\dapilDPRD;
use App\Models\Setting;
use App\Models\tps;
use App\Models\wilayah\desa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\wilayah\kecamatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
                $jumlah_kehadiran = tps::sum('kehadiran');
                return view('admin.dashboard', ['dapils' => $dapils,'jumlah_kehadiran'=>$jumlah_kehadiran]);
                break;

            case 'desa':
                $desa_id = Auth::user()->current_team_id;
                $desa = desa::find($desa_id);
                $kecamatan = kecamatan::find($desa->kecamatan_id);
                
                $data = [
                    'kecamatan' => $kecamatan,
                    'desa' => $desa,
                    'setting'=>Setting::where('key', 'type')->where('status',true)->get(),
                ];
                // return view('desa.dashboard2', $data);
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

    public function export($type,$tps_dapil,$opsi){

        $tps_id   = explode('-',$tps_dapil)[0];
        $partai_id = explode('-',$tps_dapil)[1];
        switch ($type) {
            case 'Presiden':
                $color = "#737172";
                $pemilu = 'Pilkada';
                break;
            case 'DPR RI':
                $color = "#fdf307";
                $pemilu = 'Pileg';
                break;
            case 'DPD RI':
                $color = "#e30116";
                $pemilu = 'Pilkada';
                break;
            case 'DPRD Provinsi':
                $color = "#0b6fba";
                $pemilu = 'Pileg';
                break;
            case 'DPRD':
                $color = "#06a53d";
                $pemilu = 'Pileg';
                break;
            case 'Gubernur':
                $color = "#737172";
                $pemilu = 'Pilkada';
                break;
            case 'Bupati':
                $color = "#737172";
                $pemilu = 'Pilkada';
                break;
            case 'Walikota':
                $color = "#737172";
                $pemilu = 'Pilkada';
                break;
        }
        $partai     = DaftarPartai::find($partai_id);
        $desa_id    = Auth::user()->current_team_id;
        $desa       = desa::find($desa_id);
        $tps        = tps::find($tps_id);

        if ($pemilu == 'Pileg') {
            $new_title = $tps->nama.' '.$partai->nama;
        }else{
            $new_title = $tps->nama;

        }

        switch ($opsi) {
            case 'view-kosong':
                $title      = 'Export '.$type.' '.$new_title.' '.' Desa '.$desa->nama.' Kecamatan '.$desa->kecamatan->nama.' Tanpa Hasil';
                break;
            case 'view-isi':
                $title      = 'Export '.$type.' '.$new_title.' '.' Desa '.$desa->nama.' Kecamatan '.$desa->kecamatan->nama.' Dengan Hasil';
                break;
            case 'download-kosong':
                $title      = 'Export '.$type.' '.$new_title.' '.' Desa '.$desa->nama.' Kecamatan '.$desa->kecamatan->nama.' Tanpa Hasil';
                break;
            case 'download-isi':
                $title      = 'Export '.$type.' '.$new_title.' '.' Desa '.$desa->nama.' Kecamatan '.$desa->kecamatan->nama.' Dengan Hasil';
                break;

            default:
            $title      = 'Export '.$type.' '.$new_title.' '.' Desa '.$desa->nama.' Kecamatan '.$desa->kecamatan->nama.' Tanpa Hasil';
                break;
        }
        $data = [
            'title' => $title,
            'type' => $type,
            'tps' => $tps,
            'desa' => $desa,
            'pemilu'=>$pemilu,
            'partai'=>$partai,
            'tps_id' => $tps_id,
            'partai_id' => $partai_id,
            'color'=>$color,
            'opsi'=>explode('-',$opsi)[1],
        ];
        $pdf        = Pdf::loadView('desa/dprd/exportPerDesa', $data);

        switch ($opsi) {
            case 'view-kosong':
                return $pdf->stream($title.'.pdf');
                break;
            case 'view-isi':
                return $pdf->stream($title.'.pdf');
                break;
            case 'download-kosong':
                return $pdf->download($title.'.pdf');
                break;
            case 'download-isi':
                return $pdf->download($title.'.pdf');
                break;

            default:
            return $pdf->stream($title.'.pdf');
                break;
        }
    }

    public function DapilView($id){
        $dapil = dapilDPRD::find($id);
        // $calons = Calon::suaraTerbanyakDapilDPRD('DPRD',$dapil->id,50);
        return view('admin.dapil', ['dapil' => $dapil]);
        // dd($calons);
    }
}
