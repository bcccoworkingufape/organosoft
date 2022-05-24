<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RelatorioVeiculos extends Component
{
    public $show;

    public function render()
    {
        return view('livewire.relatorio-veiculos');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }
}
