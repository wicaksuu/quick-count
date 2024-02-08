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
    public function load(){
        $calon = Calon::find($this->calon->id);
        $this->suara = $calon->suara;
    }

    public function updateSuara(){
        if ($this->suara < 0) {
            Toaster::error('Suara tidak boleh lebih kecil dari 1');
            $this->load();
        }else{
            try {
                $calon = Calon::find($this->calon->id);
                if ($calon->lock==true) {
                    $this->dispatch('suaraUpdated');
                    Toaster::error('Data telah diverifikasi, anda tidak dapat melakukan perubahan data '.$calon->nama);
                }else{
                    $calon->suara = $this->suara;
                    $calon->save();
                    $this->dispatch('suaraUpdated');
                    Toaster::success('Berhasil melakukan update suara calon '.$calon->nama);
                }
            } catch (\Throwable $th) {
                Toaster::error($th->getMessage());
            }

        }
    }
    public function render()
    {
        $this->load();
        return view('livewire.desa.componen.input-cild');
    }
}
