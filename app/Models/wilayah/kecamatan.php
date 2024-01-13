<?php

namespace App\Models\wilayah;

use App\Models\dapilDPRD;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $fillable = ['kota_id', 'nama', 'dapil_id'];

    public function dapil()
    {
        return $this->belongsTo(dapilDPRD::class);
    }

    public function kota()
    {
        return $this->belongsTo(kota::class);
    }

    public function provinsi()
    {
        return $this->kota->belongsTo(provinsi::class);
    }

    public function desas()
    {
        return $this->hasMany(desa::class);
    }
}
