<?php

namespace App\Models\wilayah;

use App\Models\dapilDPRProv;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;
    protected $fillable = ['provinsi_id', 'nama', 'dapil_id'];

    public function dapil()
    {
        return $this->belongsTo(dapilDPRProv::class);
    }
    public function provinsi()
    {
        return $this->belongsTo(provinsi::class);
    }

    public function kecamatans()
    {
        return $this->hasMany(kecamatan::class);
    }
}
