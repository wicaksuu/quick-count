<?php

namespace App\Livewire\Componen\Setting;

use App\Models\tps;
use App\Models\User;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Str;

class TabelTPS extends Component
{
    public $data=[],$query,$results,$isEdit,$dataEdit,$button,$title,$id,$tps,$desa_id,$total_tps;

    public $isOpen = false;

    public function openModal($id = null)
    {
        $this->isOpen = true;
        $this->isEdit = true;
        $this->title = 'Edit TPS';
        $this->button = 'Simpan';
        $this->desa_id=$id;
        $cek_tps = desa::with('tpss')->where('id',$id)->first();
        $this->tps = count($cek_tps->tpss);
    }

    public function save()
    {
        $desa_id = $this->desa_id;
        if ($this->tps != null) {
            try {
                DB::beginTransaction();

                $cek_tps = desa::with('tpss')->where('id',$desa_id)->first();
                foreach ($cek_tps->tpss as $cek) {
                    User::destroy($cek->user_id);
                    tps::destroy($cek->id);
                }
                for ($i=1; $i <= $this->tps ; $i++) {
                    $pass = Str::random(10);
                    $nama = 'TPS '.$i;
                    $user = User::factory()->create([
                        'name' => "Admin ".$nama." ".$cek_tps->nama,
                        'email' => strtolower(str_replace(' ','', $nama.$cek_tps->nama)),
                        'role' => 'user',
                        'is_dumy'=> true,
                        'password' => bcrypt($pass),
                        'password_dumy'=> $pass
                        ]);
                    tps::create([
                        'nama' => $nama,
                        'desa_id' => $desa_id,
                        'user_id' => $user->id
                    ]);
                }

                DB::commit();
                Toaster::success('Sukses merubah TPS pada desa '.$cek_tps->nama);
                $this->closeModal();
            } catch (\Throwable $th) {
                DB::rollBack();
                Toaster::error($th->getMessage());
            }

        }else{
            Toaster::error('Jumlah TPS tidak boleh kosong.');
        }

    }

    public function closeModal()
    {
        $query = $this->query;
        $id = $this->id;

        $this->isOpen = false;
        $this->reset();

        $this->query = $query;
        $this->id = $id;

        $this->load($id);
        $this->refresh();
    }

    public function mount()
    {
        $this->load(3519120);
    }

    public function load($id)
    {
        $this->id = $id;
        $this->total_tps = tps::count();
        $this->data=desa::where('kecamatan_id', $id)->with('kecamatan','tpss')->get();
    }

    public function refresh()
    {
        $this->results = kecamatan::where('nama', 'like', '%' . $this->query . '%')->where("kota_id",3519)->with('kota')->first();
    }

    public function render()
    {
        return view('livewire.componen.setting.tabel-t-p-s');
    }
}
