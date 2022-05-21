<?php

namespace App\Http\Livewire;

use App\Models\Contrato;
use Livewire\Component;

class DeletarContrato extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public Contrato $contrato;

    public function render()
    {
        return view('livewire.deletar-contrato');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $produtor = $this->contrato->produtor;
        $this->contrato->delete();
        return redirect()->route('produtores.contratos.index', $produtor)->with('status', 'Contrato deletado com sucesso!');
    }
}
