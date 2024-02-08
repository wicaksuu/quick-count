<?php

namespace App\Models\wilayah;

use App\Models\tps;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    use HasFactory;

    protected $fillable = ['kecamatan_id', 'nama'];

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class);
    }

    public function kota()
    {
        return $this->kecamatan->belongsTo(kota::class);
    }

    public function provinsi()
    {
        return $this->kecamatan->kota->belongsTo(provinsi::class);
    }

    public function tpss()
    {
        return $this->hasMany(tps::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'current_team_id', 'id');
    }
}
