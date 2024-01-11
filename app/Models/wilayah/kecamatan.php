<?php

namespace App\Models\wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $fillable = ['kota_id', 'nama'];

    public function kota()
    {
        return $this->belongsTo(kota::class);
    }

    public function desas()
    {
        return $this->hasMany(desa::class);
    }
}
