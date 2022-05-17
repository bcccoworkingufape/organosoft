<?php

namespace App\Http\Livewire;

use App\Models\Granja;
use Livewire\Component;

class DeletarGranja extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public Granja $granja;

    public function render()
    {
        return view('livewire.deletar-granja');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $produtor = $this->granja->produtor;
        $this->granja->delete();
        return redirect()->route('produtores.granjas.index', $produtor)->with('status', 'Granja deletada com sucesso!');
    }
}
