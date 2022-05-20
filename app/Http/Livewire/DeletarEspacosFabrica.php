<?php

namespace App\Http\Livewire;

use App\Models\EspacosFabrica;
use Livewire\Component;

class DeletarEspacosFabrica extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public EspacosFabrica $espacosFabrica;

    public function render()
    {
        return view('livewire.deletar-espacos-fabrica');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $this->espacosFabrica->delete();
        return redirect()->route('espacosFabrica.index')->with('status', 'Espaço da fábrica deletado com sucesso!');
    }
}