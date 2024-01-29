<?php

namespace App\Models;

use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use App\Models\wilayah\kota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Models\User;

class dapilDPRD extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'nama',
        'kota_id',
        'kursi',
        'user_id'
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
