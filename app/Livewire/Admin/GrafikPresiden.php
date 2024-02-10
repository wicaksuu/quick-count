<?php

namespace App\Livewire\Admin;

use App\Models\Calon;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\On;

class GrafikPresiden extends Component
{
    public $grafikPresiden;

    #[On('load')]
    public function load()
    {
        $suaras = Calon::suaraTerbanyakDapilDPRD('Presiden', null, 3);
        usort($suaras, function ($a, $b) {
            return $a['calon']->no - $b['calon']->no;
        });

        $grafikPresiden = [
            'labels' => [],
            'data' => [],
            'suara' => [],
        ];

        foreach ($suaras as $suara) {
            $grafikPresiden['labels'][] = $suara['calon']->no . ' ' .$suara['calon']->nama . ' ' . $suara['persentase_suara'] . '%';
            $grafikPresiden['data'][] = $suara['total_suara'];
            $grafikPresiden['suara'][] = $suara;
        }
        $this->grafikPresiden = json_encode($grafikPresiden);
        $this->dispatch('update', $this->grafikPresiden);
    }
    public function render()
    {
        $this->load();
        return view('livewire.admin.grafik-presiden');
    }
}
