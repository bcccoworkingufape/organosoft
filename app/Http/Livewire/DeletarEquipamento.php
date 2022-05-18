<?php

namespace App\Http\Livewire;

use App\Models\Equipamento;
use Livewire\Component;

class DeletarEquipamento extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public Equipamento $equipamento;

    public function render()
    {
        return view('livewire.deletar-equipamento');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $this->equipamento->delete();
        return redirect()->route('equipamentos.index')->with('status', 'Equipamento deletado com sucesso!');
    }
}

