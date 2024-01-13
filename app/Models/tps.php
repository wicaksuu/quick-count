<?php

namespace App\Models;

use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use App\Models\wilayah\kota;
use App\Models\wilayah\provinsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tps extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'desa_id',
    ];

    public function desa()
    {
        return $this->belongsTo(desa::class);
    }

    public function kecamatan()
    {
        return $this->desa->belongsTo(kecamatan::class);
    }

    public function kota()
    {
        return $this->desa->kecamatan->belongsTo(kota::class);
    }

    public function provinsi()
    {
        return $this->desa->kecamatan->kota->belongsTo(provinsi::class);
    }
}
