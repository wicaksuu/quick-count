<?php

namespace App\Livewire\Componen\DPRDMadiunkab;

use App\Models\dapilDPRD;
use App\Models\wilayah\kecamatan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;


class TabelDapil extends Component
{
    public $data, $nama, $kursi, $kecamatan = [], $totalKursi = 0, $title, $isDapilEdit, $kecamatanDump = [], $button, $isDell, $dataDell;
    public $isOpen = false;

    public $query;
    public $results;

    public function load()
    {
        $this->totalKursi = dapilDPRD::sum('kursi');
        $this->data = dapilDPRD::with('kecamatans', 'kota')->get();
    }

    public function openModal($id = null)
    {
        if ($id != null) {
            $this->isDapilEdit = dapilDPRD::with('kecamatans', 'kota')->find($id);
            $this->nama = $this->isDapilEdit->nama;
            $this->kursi = $this->isDapilEdit->kursi;
            $this->title = 'Edit Dapil ' . $this->isDapilEdit->nama;
            $this->button = 'Simpan';

            foreach ($this->isDapilEdit->kecamatans as $value) {
                $this->kecamatan[$value->id] = [
                    'id' => $value->id,
                    'nama' => $value->nama,
                    'kota' => $this->isDapilEdit->kota->nama,
                    'kota_id' => $this->isDapilEdit->kota->id
                ];
                $this->kecamatanDump[$value->id] = [
                    'id' => $value->id,
                    'nama' => $value->nama,
                    'kota' => $this->isDapilEdit->kota->nama,
                    'kota_id' => $this->isDapilEdit->kota->id
                ];
            }
        } else {
            $this->button = 'Tambah';
            $this->title = 'Tambah Dapil DPRD Kabupaten';
        }
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->load();
        $this->isDell = false;
        $this->isOpen = false;
    }

    public function selectResult($id)
    {
        $data = kecamatan::with('kota')->find($id);
        $this->kecamatan[$data->id] = [
            'id' => $data->id,
            'nama' => $data->nama,
            'kota' => $data->kota->nama,
            'kota_id' => $data->kota->id
        ];
        $this->query = '';
    }
    public function hapusKec($id)
    {
        unset($this->kecamatan[$id]);
    }

    public function refresh()
    {
        $this->results = kecamatan::where('nama', 'like', '%' . $this->query . '%')->where("kota_id",3519)->with('kota')->first();
    }


    public function tambahDapil()
    {
        if ($this->isDapilEdit) {
            try {
                DB::beginTransaction();
                kecamatan::whereIn('id', array_column($this->kecamatanDump, 'id'))
                    ->update(['dapil_id' => null]);
                $dapil = dapilDPRD::find($this->isDapilEdit->id)->update([
                    'nama' => $this->nama,
                    'kursi' => $this->kursi,
                    'kota_id' => $this->isDapilEdit->kota->id
                ]);

                kecamatan::whereIn('id', array_column($this->kecamatan, 'id'))
                    ->update(['dapil_id' => $this->isDapilEdit->id]);

                DB::commit();
                Toaster::success('Sukses melakukan edit ' . $this->nama);
                $this->closeModal();
            } catch (\Throwable $th) {
                DB::rollBack();
                Toaster::error($th->getMessage());
            }
        } else {
            try {
                DB::beginTransaction();

                foreach ($this->kecamatan as $value) {
                    $kota_id = $value['kota_id'];
                    $kota= $value['kota'];
                }

                $dapil = dapilDPRD::create([
                    'nama' => $this->nama.' '.$kota,
                    'kursi' => $this->kursi,
                    'user_id'=>'',
                    'kota_id' => $kota_id
                ]);
                kecamatan::whereIn('id', array_column($this->kecamatan, 'id'))
                    ->update(['dapil_id' => $dapil->id]);

                DB::commit();


                Toaster::success('Sukses menambah ' . $this->nama);
                $this->closeModal();
            } catch (\Throwable $th) {

                DB::rollBack();
                Toaster::error($th->getMessage());
            }
        }
    }


    public function openDell($id)
    {
        $this->dataDell = dapilDPRD::find($id);
        $this->nama = $this->dataDell->nama;
        $this->isDell = true;
    }


    public function deleteDapil()
    {
        try {
            DB::beginTransaction();

            foreach ($this->dataDell->kecamatans as $value) {
                $this->kecamatanDump[$value->id] = [
                    'id' => $value->id,
                    'nama' => $value->nama,
                    'kota' => $this->dataDell->kota->nama,
                    'kota_id' => $this->dataDell->kota->id
                ];
            }
            kecamatan::whereIn('id', array_column($this->kecamatanDump, 'id'))
                ->update(['dapil_id' => null]);

            dapilDPRD::destroy($this->dataDell->id);

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
        return view('livewire.componen.d-p-r-d-madiunkab.tabel-dapil');
    }
}
