<?php

namespace App\Livewire\Setting;

use App\Models\wilayah\kecamatan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TabelKecamatan extends Component
{
    public $data=[];
    public function mount(){
        $kecamatans = kecamatan::where('kota_id',3519)->get();
        $kecamatanIds = $kecamatans->pluck('id')->toArray();
        $existingUsers = \App\Models\User::whereIn(DB::raw("JSON_EXTRACT(role, '$.kecamatan_id')"), $kecamatanIds)->get()->keyBy('role->kecamatan_id');

        foreach ($kecamatans as $kecamatan) {
            $email = strtolower(str_replace(' ','_',$kecamatan->nama)).'@madiunkab.go.id';
            if (!isset($existingUsers[$kecamatan->id]) && !\App\Models\User::where('email', $email)->exists()) {
                \App\Models\User::create([
                    'name' => $kecamatan->nama,
                    'email' => $email,
                    'role' => json_encode(['role' => 'kecamatan', 'kecamatan_id' => $kecamatan->id]),
                    'is_dumy'=> true,
                    'password' => bcrypt('123456789')
                ]);
            }
        }
        $this->data = \App\Models\User::where('role', 'like', '%kecamatan%')->get();
        dd($this->data);
    }

    public function render()
    {
        return view('livewire.setting.tabel-kecamatan');
    }
}
