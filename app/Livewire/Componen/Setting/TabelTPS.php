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
    public $data=[],$query,$results,$isEdit,$dataEdit,$button,$title,$id,$tps,$desa_id,$total_tps,$desa;

    public $isOpen = false,$isopenModalDesa=false;

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

    public function HapusDesa($id){
        try {
            desa::destroy($id);
            Toaster::success('Data berhasil dihapus');
            $this->mount();
        } catch (\Throwable $th) {
            Toaster::error($th->getMessage());
        }
    }

    public function capitalizeAfterSpace($string) {

        $string = strtolower($string);
        $data = explode(" ", $string);
        $out=[];
        foreach ($data as $value) {
            $firstLetter = substr($value, 0, 1);
            $result = substr($value, 1);
            $replace = strtoupper($firstLetter);
            $out[] = $replace.$result;
        }
        return implode(" ", $out);
    }

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

    public function openModalDesa(){

        $this->isopenModalDesa = true;
    }

    public function addDesa(){
        if ($this->desa=='') {
            Toaster::error('Nama desa tidak boleh kosong');
            return;
        }
        try {
            DB::beginTransaction();
            $desa = $this->desa;
            $kecamatan = $this->data[0]->kecamatan;
            $add = [
                'kecamatan_id' =>$kecamatan->id,
                'nama' => $this->capitalizeAfterSpace($desa),
            ];
            $desa_id = desa::create($add);

            $pass = mt_rand(10000000, 99999999);
            User::factory()->create([
                'name' => "Admin ".$this->capitalizeAfterSpace($desa),
                'email' => strtolower(str_replace(' ','', $kecamatan->nama))."_".strtolower(str_replace(' ','', $desa)).ENV("MAIL","@madiunkab.go.id"),
                'role' => 'desa',
                'current_team_id'=>$desa_id->id,
                'is_dumy'=> true,
                'password' => bcrypt($pass),
                'password_dumy'=> $pass
                ]);

            DB::commit();
            Toaster::success("Berhasil menambah desa.");
            $this->closeModal();

        } catch (\Throwable $th) {
            DB::rollBack();
            Toaster::error($th->getMessage());
        }
    }

    public function save()
    {
        $desa_id = $this->desa_id;
        if ($this->tps != null) {
            try {
                DB::beginTransaction();

                $cek_tps = desa::with('tpss')->where('id',$desa_id)->first();
                foreach ($cek_tps->tpss as $cek) {
                    tps::destroy($cek->id);
                    $user =  User::find($cek->user_id);
                    $user->delete();
                }
                for ($i=1; $i <= $this->tps ; $i++) {
                    $pass = strtolower(Str::random(10));
                    $nama = 'TPS '.$i;
                    $user = User::factory()->create([
                        'name' => "Admin ".$nama." ".$cek_tps->nama,
                        'email' => strtolower(str_replace(' ','', $nama.$cek_tps->nama))."_".$pass.ENV("MAIL","@madiunkab.go.id"),
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
        $this->data=desa::where('kecamatan_id', $id)->with('kecamatan','tpss','user')->get();
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
