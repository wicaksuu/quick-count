<?php

namespace App\Livewire\Admin\Pileg;

use App\Models\Calon;
use Livewire\Component;
use Livewire\Attributes\On;

class ViewTabelPileg extends Component
{
    public $calons=[];
    public $type,$key,$dapil_id;

    #[On('GetDapil')]
    public function GetDapil($dapil_id){
        $this->dapil_id = $dapil_id;
        $calon['data'] = Calon::getSuara( $this->type,$dapil_id);
        $calon['key'] = $this->key;
        $this->dispatch('update', json_encode($calon));
    }

    public function mount($type,$key){
        $this->type = $type;
        $this->key = $key;
    }

    public function render()
    {
        return view('livewire.admin.pileg.view-tabel-pileg');
    }
}
