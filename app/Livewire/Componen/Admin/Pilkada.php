<?php

namespace App\Livewire\Componen\Admin;

use App\Models\Calon;
use App\Models\dapilDPRD;
use App\Models\tps;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Pilkada extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public $isOpen = false,$no;
    public $suara, $title,$button,$isEdit,$foto,$tmp,$nama,$dapil=[],$results,$query,$partai,$data, $tahun,$tahuns,$status,$isDell,$isDells;


    public $selectedYear, $pilihdapil, $dapils, $dataEdits,$type;

    public function openDell($key)
    {
        $this->isDells = Calon::where('key', $key)->get();
        $this->isDell = true;
    }

    public function Hapus()
    {
        try {
            DB::beginTransaction();
            $idsToDelete = $this->isDells->pluck('id')->toArray();
            Calon::whereIn('id', $idsToDelete)->delete();
            Toaster::success('Sukses menghapus ' . $this->nama);
            DB::commit();
            $this->closeModal();
        } catch (\Throwable $th) {
            DB::rollBack();
            Toaster::error($th->getMessage());
        }
    }

    public function updateSelectedYear()
    {
        $this->load();
    }

    public function mount($type)
    {
        $this->type = $type;
    }

    public function updatedFoto()
    {
        $this->tmp=null;
        $this->validate([
            'foto' => 'image|max:1024|mimes:png,jpeg,jpg', // 1MB Max
        ]);
    }

    public function save()
    {
        if($this->nama==null)
        {
            Toaster::error('Nama tidak boleh kosong');
            return;
        }

        try {

            DB::beginTransaction();
            if ($this->isEdit==true) {
                if ($this->foto != null) {
                    $name = 'foto-calon/'.md5($this->foto . microtime()).'.'.$this->foto->extension();
                    $this->foto->storeAs('public', $name );
                }else{
                    $name = $this->tmp;
                }

                $data = Calon::where('key', $this->dataEdits->key)->get();

                foreach ($data as $dataEdit) {
                    $calon = Calon::find($dataEdit->id);
                    $calon->foto = $name;
                    $calon->no = $this->no;
                    $calon->nama = $this->nama;
                    $calon->tahun = $this->tahun;
                    $calon->is_active = $this->status;
                    $calon->save();
                }
                Toaster::success('Sukses mengedit ' . $this->nama);
            }else{

                if ($this->foto != null) {
                    $name = 'foto-calon/'.md5($this->foto . microtime()).'.'.$this->foto->extension();
                    $this->foto->storeAs('public', $name );
                }else{
                    $name = null;
                }

                $save=[];
                $key = md5($this->nama);
                    $tpss = tps::get();
                    foreach ($tpss as $tps) {
                        $save[] = [
                            'nama' => $this->nama,
                        ];
                        $sad = [
                            'nama' => $this->nama,
                            'no' => $this->no,
                            'foto' => $name,
                            'key' => $key,
                            'tps_id' => $tps->id,
                            'tahun' => $this->tahun,
                            "type" => $this->type,
                            'is_active' => $this->status,
                        ];
                        Calon::create($sad);
                    }
                if (count($save) == 0) {
                    Toaster::error('Mohon isi tps di dapil yang di pilih.');
                    DB::rollBack();
                    return;
                }
                Toaster::success('Sukses menambah ' . $this->nama);
            }

            DB::commit();
            $this->closeModal();
        } catch (\Throwable $th) {
            DB::rollBack();
            Toaster::error($th->getMessage());
        }

    }

    public function openModal($id = null)
    {
        $this->isOpen = true;

        $this->suara = Calon::where('key', $id)->sum('suara');
        $this->tahun = date('Y');
        if ($id != null) {
            $this->dataEdits = Calon::where('key', $id)->first();
            $this->tmp = $this->dataEdits->foto;
            $this->nama = $this->dataEdits->nama;
            $this->no = $this->dataEdits->no;
            $this->tahun = $this->dataEdits->tahun;
            $this->status = $this->dataEdits->is_active;
            $this->isEdit = true;
            $this->title = 'Edit Pasangan Calon.';
            $this->button = 'Simpan';
        } else {
            $this->isEdit = false;
            $this->title = 'Tambah Pasangan Calon.';
            $this->button = 'Tambah';
        }
    }
    public function closeModal()
    {
        $partai = $this->partai;
        $status = $this->status;
        $type = $this->type;
        $this->isOpen = false;
        $this->reset();
        $this->partai = $partai;
        $this->type = $type;
        $this->status = $status;
        $this->load();
    }

    public function load()
    {
        $query = Calon::orderBy('no', 'asc');
        $this->tahuns=$query->select('tahun')->distinct()->get();
        $query->where('type', $this->type);
        if ($this->selectedYear != null) {
            $query->where('tahun', $this->selectedYear);
        }
            $this->data = $query
                ->select('nama', 'key', 'tahun', 'foto','is_active','no')
                ->distinct()
                ->get();
    }
    public function render()
    {
        $this->load();
        return view('livewire.componen.admin.pilkada');
    }
}
