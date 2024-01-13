<?php

namespace App\Livewire\Componen\Setting;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class GobalSetting extends Component
{
    public $data, $tahun;

    public function addTahun()
    {
        if ($this->tahun < 2000) {
            Toaster::error('Tahun harus lebih dari 2000.');
            return;
        }
        try {
            DB::beginTransaction();
            Setting::create([
                'nama' => $this->tahun,
                'key'=>'tahun',
                'status'=> true,
            ]);

            DB::commit();
            $this->tahun = null;
            Toaster::success('Sukses menambah tahun');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toaster::error($th->getMessage());
        }
    }

    public function hapusTahun($id)
    {
        try {
            DB::beginTransaction();
            Setting::destroy($id);
            DB::commit();
            Toaster::success('Sukses menghapus tahun');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toaster::error($th->getMessage());
        }
    }
    public function render()
    {
        $this->data = Setting::get();
        return view('livewire.componen.setting.gobal-setting');
    }
}
