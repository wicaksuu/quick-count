<?php

namespace App\Models;

use App\Models\wilayah\kecamatan;
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
}
