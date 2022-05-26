<?php

namespace App\Http\Livewire;

use App\Models\Coleta;
use Livewire\Component;

class DeletarColeta extends Component
{

    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public Coleta $coleta;

    public function render()
    {
        return view('livewire.deletar-coleta');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $granja = $this->coleta->id_granja;
        $this->coleta->delete();
        return redirect()->route('coleta.show', $granja)->with('status', 'Coleta deletada com sucesso!');
    }
}
