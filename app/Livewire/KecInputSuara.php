<?php

namespace App\Livewire;

use App\Models\Calon;
use App\Models\tps;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\DB;

class KecInputSuara extends Component
{
    public $desa, $calon, $tps;
    public $suara = 0;

    public function mount($desa, $calon)
    {
        $this->desa = $desa;
        $this->tps = tps::where('desa_id', $desa->id)->first();
        $this->calon = Calon::where([
            ['type', $calon->type],
            ['is_active', true],
            ['no', $calon->no],
            ['tps_id', $this->tps->id]
        ])->first();
        $this->suara = $this->calon->suara;
    }

    public function input()
    {
        DB::beginTransaction();
        try {
            $this->calon->suara = $this->suara;
            $this->calon->save();
            DB::commit();
            Toaster::success('Suara berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            Toaster::error('Gagal mengupdate suara: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.kec-input-suara');
    }
}
