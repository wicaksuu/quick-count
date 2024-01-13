<?php

namespace App\Http\Controllers;

use App\Models\DaftarPartai;
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
    public function settingPartai()
    {
        return view('admin.setting.partai');
    }
    public function settingCalonDPRD($id)
    {
        $partai = DaftarPartai::find($id);
        return view('admin.dprd.calon-partai',['partai' => $partai, 'type'=>'DPRD']);

    }

    public function settingGlobal()
    {
        return view('admin.setting.global');
    }
}
