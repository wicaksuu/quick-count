<?php

namespace App\Livewire\Componen\Admin;

use App\Models\DaftarPartai;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Navigasi extends Component
{
    public $partais=[];

    public function Loader()
    {
        $this->partais = DaftarPartai::get();
    }

    public function render()
    {
        $this->loader();
        return view('livewire.componen.admin.navigasi');
    }
}
