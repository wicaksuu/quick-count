<?php

namespace App\Http\Controllers\region;

use App\Http\Controllers\Controller;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use App\Models\wilayah\kota;
use App\Models\wilayah\provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\FuncCall;

class WilayahController extends Controller
{
    public function getProvinsi()
    {
        $data = provinsi::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function getKota($provinsi_id)
    {
        $data = kota::where('provinsi_id', $provinsi_id)->with('provinsi')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function getKecamatan($kota_id)
    {
        $data = kecamatan::where('kota_id', $kota_id)->with('kota')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }
    public function getDesa($kecamatan_id)
    {
        $data = desa::where('kecamatan_id', $kecamatan_id)->with('kecamatan')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }
}
