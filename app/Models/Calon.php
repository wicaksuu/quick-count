<?php

namespace App\Models;

use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Calon extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['no', 'nama', 'key', 'type', 'foto', 'suara', 'tps_id', 'partai_id', 'dapil_id', 'tahun', 'lock', 'is_active'];

    public function tps()
    {
        return $this->belongsTo(tps::class)->with('desa');
    }

    public function dapil()
    {
        return $this->belongsTo(dapilDPRD::class);
    }

    public function partai()
    {
        return $this->belongsTo(DaftarPartai::class);
    }

    public function kecamatans()
    {
        return $this->hasManyThrough(
            kecamatan::class,
            dapilDPRD::class,
            'id',
            'dapil_id',
            'dapil_id',
            'id',
        );
    }

    public static function suaraTerbanyak($type)
    {
        $data = static::select('key')->selectRaw('SUM(suara) as total_suara')->where('type', $type)->groupBy('key')->orderByDesc('total_suara')->first();
        if ($data) {
            if (isset($data[0])) {
                $key = $data[0]->key;
            } else {
                $key = $data->key;
            }
            $calon = Calon::where('key', $key)->with('partai', 'dapil')->first();
            return ['calon' => $calon, 'total_suara' => $data->total_suara];
        } else {
            return null;
        }
    }

    public static function suaraTerbanyakDapilDPRD($type, $dapil_id, $i = 1)
    {
        $data = static::select('key')->selectRaw('SUM(suara) as total_suara')->where('dapil_id', $dapil_id)->where('type', $type)->groupBy('key')->orderByDesc('total_suara')->take($i)->get();
        $jumlah_suara = Calon::where('dapil_id', $dapil_id)->where('type', $type)->sum('suara');
        if ($data) {
            $result = [];
            foreach ($data as $item) {
                $calon = Calon::where('key', $item->key)
                    ->with('partai', 'dapil')
                    ->first();
                if ($jumlah_suara != 0) {
                    $persentase = number_format(($item->total_suara / $jumlah_suara) * 100, 2);
                } else {
                    $persentase = 0;
                }
                if ($calon) {
                    $result[] = ['calon' => $calon, 'total_suara' => $item->total_suara, 'jumlah_suara' => $jumlah_suara, 'persentase_suara' => $persentase];
                }
            }
            return $result;
        } else {
            return null;
        }
    }
    public static function getSuara($type, $dapil_id = null, $kecamatan_id = null,$tps_id = null, $nama = null,  $perPage = 100, $page = 1)
    {
        $query = static::select('key')->selectRaw('SUM(suara) as total_suara');

        if ($tps_id) {
            $query->where('tps_id', $tps_id);
        }
        if ($dapil_id) {
            $query->where('dapil_id', $dapil_id);
        }

        if ($nama) {
            $query->whereHas('calon', function ($query) use ($nama) {
                $query->where('nama', 'like', '%' . $nama . '%');
            });
        }

        if ($kecamatan_id) {
            $query->whereHas('kecamatans', function ($query) use ($kecamatan_id) {
                $query->where('kecamatans.id', $kecamatan_id);
            });
        }

        $query->where('type', $type)
              ->groupBy('key')
              ->orderByDesc('total_suara');

        $data = $query->paginate($perPage, ['*'], 'page', $page);

        $jumlah_suara = Calon::where('dapil_id', $dapil_id)->where('type', $type)->sum('suara');
        if ($data->isNotEmpty()) {
            $result = [];
            foreach ($data as $item) {
                $calon = Calon::where('key', $item->key)
                    ->with('partai', 'dapil','kecamatans','tps')
                    ->first();

                if ($jumlah_suara != 0) {
                    $persentase = number_format(($item->total_suara / $jumlah_suara) * 100, 2);
                } else {
                    $persentase = 0;
                }
                if ($calon) {
                    $result[] = ['calon' => $calon, 'total_suara' => $item->total_suara, 'jumlah_suara' => $jumlah_suara, 'persentase_suara' => $persentase];
                }
            }
            return ['data' => $result, 'pagination' => $data];
        } else {
            return ['data' => null, 'pagination' => null];
        }
    }

}
