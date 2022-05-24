<?php

namespace App\Http\Livewire;

use App\Models\Maquina;
use Livewire\Component;

class DeletarMaquina extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public Maquina $maquina;

    public function render()
    {
        return view('livewire.deletar-maquina');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $this->maquina->delete();
        return redirect()->route('maquinas.index')->with('status', 'Máquina deletada com sucesso!');
    }
}

