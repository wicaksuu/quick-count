<?php

namespace App\Models;

use App\Models\wilayah\kota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapilDPRProv extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kota_id',
        'kursi'
    ];

    public function kotas()
    {
        return $this->hasMany(kota::class, 'dapil_id');
    }
}
