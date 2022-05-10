<?php

namespace App\Http\Livewire;

use App\Models\CategoriaVeiculo;
use Livewire\Component;

class DeletarCategoriaVeiculo extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public CategoriaVeiculo $categoriaVeiculo;

    public function render()
    {
        return view('livewire.deletar-categoria-veiculo');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $this->categoriaVeiculo->delete();
        return redirect()->route('categoriaVeiculos.index')->with('status', 'Categoria de veículos deletada com sucesso!');
    }
}