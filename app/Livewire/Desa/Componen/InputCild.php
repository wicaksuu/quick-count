<?php

namespace App\Livewire\Desa\Componen;

use App\Models\Calon;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class InputCild extends Component
{
    public $calon,$suara;

    public function mount($calon){
        $this->calon = $calon;
        $this->suara = $calon->suara;
    }

    public function updateSuara(){
        if ($this->suara < 0) {
            Toaster::error('Suara tidak boleh lebih kecil dari 1');
            $calon = Calon::find($this->calon->id);
            $this->suara = $calon->suara;
        }else{
            $this->dispatch('suaraUpdated');
            try {
                $calon = Calon::find($this->calon->id);
                $calon->suara = $this->suara;
                $calon->save();
                Toaster::success('Berhasil melakukan update suara calon '.$calon->nama);
            } catch (\Throwable $th) {
                Toaster::error($th->getMessage());
            }

        }
    }
    public function render()
    {
        return view('livewire.desa.componen.input-cild');
    }
}
