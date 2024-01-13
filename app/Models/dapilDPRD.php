<?php

namespace App\Models;

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
    public function kota()
    {
        return $this->belongsTo(kota::class);
    }
}
