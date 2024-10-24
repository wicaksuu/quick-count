<?php

namespace App\Livewire;

use App\Models\Calon;
use Livewire\Component;

class KecInputSuaraBupati extends Component
{

    public $desas = [];
    public $calons = [];

    public function mount($kecamatan)
    {
        $this->desas = $kecamatan->desas;
        $this->loadCalons();
    }

    private function loadCalons()
    {
        $calon1 = Calon::orderBy('no', 'asc')
            ->where('type', 'Bupati')
            ->where('is_active', true)
            ->where('no', 1)
            ->first();

            $calon2 = Calon::orderBy('no', 'asc')
            ->where('type', 'Bupati')
            ->where('is_active', true)
            ->where('no', 2)
            ->first();

            $this->calons = [
                '1' => $calon1,
                '2' => $calon2,
            ];

    }
    public function render()
    {
        return view('livewire.kec-input-suara-bupati');
    }
}
