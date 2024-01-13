<?php

namespace App\Models;

use App\Models\wilayah\kecamatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'key',
        'foto',
        'suara',
        'tps_id',
        'partai_id',
        'dapil_id',
        'tahun',
        'is_active'
    ];


    public function dapil()
    {
        return $this->belongsTo(dapilDPRD::class);
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
