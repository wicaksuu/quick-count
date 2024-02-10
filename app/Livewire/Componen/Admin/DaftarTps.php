<?php

namespace App\Livewire\Componen\Admin;

use App\Models\tps;
use App\Models\wilayah\desa;
use App\Models\wilayah\kecamatan;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DaftarTps extends Component
{
    public $selectID, $tpss,$total_tps,$daftar_kecamatan,$daftar_desa,$pilihKecamatan,$pilihDesa,$title,$button,$isOpen=false,$NamaTPS,$selectDesa,$isEdit=false;

    public function openModal(){
        if ($this->pilihDesa) {
            $this->selectDesa = desa::find($this->pilihDesa);
            $this->title = 'Tambah TPS Desa'.$this->selectDesa->nama;
            $this->button = 'Tambah';
            $this->isOpen = true;
            $this->isEdit = false;
        }else{
            Toaster::error('Mohon memilih desa terlebih dahulu');
        }
    }
    public function Edit($id){
        if ($this->pilihDesa) {
            $this->selectID = $id;
            $this->NamaTPS = tps::find($id)->nama;
            $this->selectDesa = desa::find($this->pilihDesa);
            $this->title = 'Edit TPS Desa '.$this->selectDesa->nama;
            $this->button = 'Save';
            $this->isOpen = true;
            $this->isEdit = true;
        }else{
            Toaster::error('Mohon memilih desa terlebih dahulu');
        }
    }

    public function HapusTPS($id){
        try {
            DB::beginTransaction();
            $tps = tps::find($id);
            $tps->delete();
            User::destroy($tps->user_id);
            DB::commit();
            Toaster::success('Data berhasil dihapus');
        } catch (\Throwable $th) {
            Toaster::error($th->getMessage());
            DB::rollBack();
        }

    }

    public function save(){
        if ($this->selectID) {
            try {
                DB::beginTransaction();
                $tps = tps::find($this->selectID);
                $tps->nama = $this->NamaTPS;
                $tps->save();
                $this->load();
                DB::commit();
                Toaster::success('Sukses melakukan edit TPS ');
            } catch (\Throwable $th) {
                Toaster::error($th->getMessage());
                DB::rollBack();
            }
        }else{
            try {
                DB::beginTransaction();
                $pass = strtolower(Str::random(10));
                $nama = $this->NamaTPS.' '.$this->selectDesa->nama;
                $user = User::factory()->create([
                    'name' => "Admin ".$nama." ",
                    'email' => strtolower(str_replace(' ','', $this->NamaTPS.'_'.$this->selectDesa->nama.'_'.$this->selectDesa->kecamatan->nama))."@madiunkab.go.id",
                    'role' => 'user',
                    'is_dumy'=> true,
                    'password' => bcrypt($pass),
                    'password_dumy'=> $pass
                    ]);
                tps::create([
                    'nama' => $nama,
                    'desa_id' => $this->selectDesa->id,
                    'user_id' => $user->id
                ]);
                $this->closeModal();
                $this->load();
                DB::commit();
                Toaster::success('Sukses menambah TPS ');
            } catch (\Throwable $th) {
                DB::rollBack();
                Toaster::error($th->getMessage());
            }
        }
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    public function load(){
        $this->daftar_kecamatan = kecamatan::where('kota_id',3519)->get();
        if ($this->pilihKecamatan) {
            $this->daftar_desa = desa::where('kecamatan_id',$this->pilihKecamatan)->get();
        }
        if ($this->pilihDesa) {
            $this->tpss = tps::where('desa_id',$this->pilihDesa)->get();
            $this->total_tps = count($this->tpss);
        }
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
        } catch (\Throwable $th) {
            Toaster::error($th->getMessage());
        }
    }

    public function render()
    {
        $this->load();
        return view('livewire.componen.admin.daftar-tps');
    }
}
