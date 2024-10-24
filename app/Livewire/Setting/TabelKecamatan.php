<?php

namespace App\Livewire\Setting;

use App\Models\User;
use App\Models\wilayah\kecamatan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Masmerise\Toaster\Toaster;

class TabelKecamatan extends Component
{
    public $data=[];
    public function mount(){
        $kecamatans = kecamatan::where('kota_id',3519)->get();
        $kecamatanIds = $kecamatans->pluck('id')->toArray();
        $existingUsers = User::whereIn(DB::raw("JSON_EXTRACT(role, '$.kecamatan_id')"), $kecamatanIds)->get()->keyBy('role->kecamatan_id');

        foreach ($kecamatans as $kecamatan) {
            $email = strtolower(str_replace(' ','_',$kecamatan->nama)).'@madiunkab.go.id';
            if (!isset($existingUsers[$kecamatan->id]) && !\App\Models\User::where('email', $email)->exists()) {
                User::create([
                    'name' => $kecamatan->nama,
                    'email' => $email,
                    'role' => json_encode(['role' => 'kecamatan', 'kecamatan_id' => $kecamatan->id]),
                    'is_dumy'=> true,
                    'password' => bcrypt('123456789')
                ]);
            }
        }
        $this->data = User::where('role', 'like', '%kecamatan%')->get();
    }

    public function refresh()
    {
        $this->data = User::where('role', 'like', '%kecamatan%')->get();
    }

    public function ResetPass($id){
        try {
            $pass = mt_rand(10000000, 99999999);
            $user = User::find($id);
            $user->is_dumy = true;
            $user->password = bcrypt($pass);
            $user->password_dumy = $pass;
            $user->save();
            Toaster::success('Password Berhasil Di Reset');
            $this->refresh();
        } catch (\Throwable $th) {
            Toaster::error($th->getMessage());
            $this->refresh();
        }
    }

    public function render()
    {
        return view('livewire.setting.tabel-kecamatan');
    }
}
