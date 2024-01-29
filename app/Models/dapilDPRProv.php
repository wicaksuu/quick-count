<?php

namespace App\Models;

use App\Models\wilayah\kota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class dapilDPRProv extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'nama',
        'kota_id',
        'kursi',
        'user_id'
    ];

    public function kotas()
    {
        return $this->hasMany(kota::class, 'dapil_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
