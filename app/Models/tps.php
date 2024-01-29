<?php

namespace App\Models;

use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use App\Models\wilayah\kota;
use App\Models\wilayah\provinsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class tps extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'nama',
        'desa_id',
        "user_id"
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
