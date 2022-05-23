<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\QualidadeColeta;

class DeletarQualidadeColeta extends Component
{
    public $show;
    public $tipo = 'button';
    public $cor = 'primary';

    public QualidadeColeta $qualidade;

    public function render()
    {
        return view('livewire.deletar-qualidade-coleta');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function deletar()
    {
        $coleta = $this->qualidade->id_coleta;
        $this->qualidade->delete();
        return redirect()->route('coleta.view',$coleta)->with('status', 'Coleta deletada com sucesso!');
    }
}
