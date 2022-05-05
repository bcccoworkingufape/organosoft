<?php

namespace App\Http\Livewire;

use App\Models\Produtor;
use Livewire\Component;

class DeletarProdutor extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public Produtor $produtor;

    public function render()
    {
        return view('livewire.deletar-produtor');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $this->produtor->delete();
        return redirect()->route('produtores.index')->with('status', 'Produtor deletado com sucesso!');
    }
}
