<?php

namespace App\Livewire\Componen;

use App\Models\Calon;
use App\Models\dapilDPRD;
use App\Models\tps;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DaftarCalonPartai extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public $isOpen = false,$no;
    public $suara, $title,$button,$isEdit,$foto,$tmp,$nama,$dapil=[],$results,$query,$partai,$data, $tahun,$tahuns,$status,$isDell,$isDells;


    public $selectedYear, $pilihdapil, $dapils, $dataEdits,$type;

    public function openDell($key,$dapil_id)
    {
        if ($this->type == 'DPRD') {
            $this->isDells = Calon::where('partai_id', $this->partai->id)->where('dapil_id', $dapil_id)->where('nama', $key)->get();
        }else{
            $this->isDells = Calon::where('partai_id', $this->partai->id)->where('nama', $key)->get();
        }
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
    public function updateDapil()
    {
        $this->load();
    }
    public function mount($partai,$type)
    {
        $this->partai = $partai;
        $this->type = $type;
    }

    public function updatedFoto()
    {
        $this->tmp=null;
        $this->validate([
            'foto' => 'image|max:1024|mimes:png,jpeg,jpg', // 1MB Max
        ]);
    }

    public function refresh()
    {
        $this->results = dapilDPRD::where('nama', 'like', '%' . $this->query . '%')->first();
    }

    public function selectResult($id)
    {
        $data = dapilDPRD::find($id);
        $this->dapil = [
            'id' => $data->id,
            'nama' => $data->nama,
        ];
        $this->query = '';
    }

    public function hapusdapil()
    {
        unset($this->dapil);
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

                $data = Calon::where('partai_id', $this->partai->id)->where('key', $this->dataEdits->key)->get();

                foreach ($data as $dataEdit) {
                    $calon = Calon::find($dataEdit->id);
                    $calon->foto = $name;
                    $calon->no = $this->no;
                    $calon->nama = $this->nama;
                    $calon->tahun = $this->tahun;
                    if ($this->type == 'DPRD') {
                        $calon->dapil_id = $this->dapil['id'];
                    }
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
                if ($this->type == 'DPRD') {
                    $tpss = dapilDPRD::with('daftarTps')->find($this->dapil['id']);
                    foreach ($tpss->daftarTps as $values) {
                        foreach ($values->tpss as $value) {
                            if (isset($value->id)) {
                                $save[] = [
                                    'nama' => $this->nama,
                                ];
                                $sad = [
                                    'nama' => $this->nama,
                                    'no' => $this->no,
                                    'foto' => $name,
                                    'key' => $key,
                                    'tps_id' => $value->id,
                                    'partai_id' => $this->partai->id,
                                    'tahun' => $this->tahun,
                                    "type" => $this->type,
                                    'is_active' => $this->status,
                                    'dapil_id' => $this->dapil['id']
                                ];
                                Calon::create($sad);

                            }
                        }
                    }
                }else{
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
                            'partai_id' => $this->partai->id,
                            'tahun' => $this->tahun,
                            "type" => $this->type,
                            'is_active' => $this->status,
                        ];
                        Calon::create($sad);
                    }
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
            $this->dataEdits = Calon::with('dapil')->where('partai_id', $this->partai->id)->where('key', $id)->first();
            $this->tmp = $this->dataEdits->foto;
            $this->nama = $this->dataEdits->nama;
            $this->no = $this->dataEdits->no;
            $this->tahun = $this->dataEdits->tahun;
            $this->status = $this->dataEdits->is_active;
            if (isset($this->dataEdits->dapil->id)) {
                $this->dapil = [
                    'id' => $this->dataEdits->dapil->id,
                    'nama' => $this->dataEdits->dapil->nama,
                    'no' => $this->dataEdits->dapil->no,
                ];
            }
            $this->isEdit = true;
            $this->title = 'Edit Calon '.$this->partai->nama ;
            $this->button = 'Simpan';
        } else {
            $this->isEdit = false;
            $this->title = 'Tambah Calon '.$this->partai->nama ;
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
        $query = Calon::where('partai_id', $this->partai->id)->orderBy('no', 'asc');
        $this->tahuns=$query->select('tahun')->distinct()->get();
        if ($this->type == 'DPRD') {
            $this->dapils= $query
            ->with('dapil')
            ->select('dapil_id')
            ->distinct()
            ->get();
        }

        $query->where('type', $this->type);

        if ($this->selectedYear != null) {
            $query->where('tahun', $this->selectedYear);
        }
        if ($this->pilihdapil != null) {
            $query->where('dapil_id', $this->pilihdapil);
        }
        if ($this->type == 'DPRD') {
            $this->data = $query
                ->with('dapil', 'kecamatans')
                ->select('nama', 'dapil_id', 'key', 'tahun', 'foto','is_active','no')
                ->distinct()
                ->get();
        }else{
            $this->data = $query
                ->select('nama', 'key', 'tahun', 'foto','is_active','no')
                ->distinct()
                ->get();
        }
    }
    public function render()
    {
        $this->load();
        return view('livewire.componen.daftar-calon-partai');
    }
}
