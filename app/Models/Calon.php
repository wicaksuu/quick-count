<?php

namespace App\Models;

use App\Models\wilayah\kecamatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Calon extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'no',
        'nama',
        'key',
        'type',
        'foto',
        'suara',
        'tps_id',
        'partai_id',
        'dapil_id',
        'tahun',
        'lock',
        'is_active'
    ];

    public static function suaraTerbanyak($type,$i=1)
    {
        $data = static::select('key')
            ->selectRaw('SUM(suara) as total_suara')
            ->where('type', $type)
            ->groupBy('key')
            ->orderByDesc('total_suara')
            ->take($i)
            ->first();
        if ($data) {
            if (isset($data[0])) {
                $key = $data[0]->key;
            }else{
                $key = $data->key;
            }
            $calon = Calon::where('key',$key)->with('partai','dapil')->first();
            return ['calon' => $calon,'total_suara'=>$data->total_suara];
        }else{
            return null;
        }
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
            'id', // Foreign key on dapilDPRD table
            'dapil_id', // Foreign key on kecamatan table
            'dapil_id', // Local key on Calon model
            'id' // Local key on dapilDPRD model
        );
    }
}
