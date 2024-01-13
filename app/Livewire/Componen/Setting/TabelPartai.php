<?php


namespace App\Livewire\Componen\Setting;

use App\Models\DaftarPartai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class TabelPartai extends Component
{
    use WithFileUploads;

    public $data=[],$button,$title, $nama,$logo,$isEdit,$dataEdit,$tmp,$isDell,$dataDell;
    public $isOpen = false;

    public function load()
    {
        $this->data=DaftarPartai::get();
    }

    public function tambahPartai()
    {
        if($this->nama==null)
        {
            Toaster::error('Nama tidak boleh kosong');
            return;
        }

        try {
            DB::beginTransaction();
            if ($this->isEdit==true) {
                if ($this->logo != null) {
                    $name = 'logo-partai/'.md5($this->logo . microtime()).'.'.$this->logo->extension();
                    $this->logo->storeAs('public', $name );
                }else{
                    $name = $this->tmp;
                }
                DaftarPartai::where('id',$this->dataEdit->id)->update([
                    'nama' => $this->nama,
                    'logo' => $name
                ]);
                Toaster::success('Sukses mengedit ' . $this->nama);
            }else{

                $name = 'logo-partai/'.md5($this->logo . microtime()).'.'.$this->logo->extension();
                $this->logo->storeAs('public', $name );
                DaftarPartai::create(['nama'=>$this->nama,'logo'=>$name]);
                Toaster::success('Sukses menambah ' . $this->nama);
            }

            DB::commit();
            $this->closeModal();
        } catch (\Throwable $th) {
            DB::rollBack();
            Toaster::error($th->getMessage());
        }

    }

    public function updatedLogo()
    {
        $this->tmp=null;
        $this->validate([
            'logo' => 'image|max:1024|mimes:png,jpeg,jpg', // 1MB Max
        ]);
    }

    public function openModal($id = null)
    {
        $this->isOpen = true;
        $this->load();

        if ($id != null) {
            $this->dataEdit = DaftarPartai::find($id);
            $this->nama = $this->dataEdit->nama;
            $this->tmp = $this->dataEdit->logo;
            $this->isEdit = true;
            $this->title = 'Edit Dapil' ;
            $this->button = 'Simpan';
        } else {
            $this->isEdit = false;
            $this->title = 'Tambah Partai' ;
            $this->button = 'Tambah';
        }
    }
    public function closeModal()
    {
        $this->isOpen = false;
        $this->load();
        $this->reset();
    }
    public function openDell($id)
    {
        $this->dataDell = DaftarPartai::find($id);
        $this->nama = $this->dataDell->nama;
        $this->isDell = true;
    }
    public function deletePartai()
    {
        try {
            DB::beginTransaction();
            Storage::delete($this->dataDell->logo);
            DaftarPartai::destroy($this->dataDell->id);
            DB::commit();
            Toaster::success('Sukses menghapus ' . $this->nama);
            $this->closeModal();
        } catch (\Throwable $th) {
            DB::rollBack();
            Toaster::error($th->getMessage());
        }
    }
    public function render()
    {
        $this->load();
        return view('livewire.componen.setting.tabel-partai');
    }
}
