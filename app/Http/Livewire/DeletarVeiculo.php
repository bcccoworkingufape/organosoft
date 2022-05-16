<?php

namespace App\Http\Livewire;

use App\Models\Veiculo;
use Livewire\Component;

class DeletarVeiculo extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public Veiculo $veiculo;

    public function render()
    {
        return view('livewire.deletar-veiculo');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $this->veiculo->delete();
        return redirect()->route('veiculos.index')->with('status', 'Veículo deletada com sucesso!');
    }
}

