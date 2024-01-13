<?php

namespace App\Models;

use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use App\Models\wilayah\kota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapilDPRD extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kota_id',
        'kursi'
    ];

    public function kecamatans()
    {
        return $this->hasMany(kecamatan::class, 'dapil_id');
    }

    public function desa()
    {
        return $this->hasManyThrough(desa::class, kecamatan::class, 'dapil_id', 'kecamatan_id', 'id', 'id');
    }
    public function daftarTps()
    {
        return $this->hasManyThrough(desa::class, kecamatan::class, 'dapil_id', 'kecamatan_id', 'id', 'id')
            ->with('tpss');
    }


    public function kota()
    {
        return $this->belongsTo(kota::class);
    }
}
