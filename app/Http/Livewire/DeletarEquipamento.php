<?php

namespace App\Http\Livewire;

use App\Models\Equipamento;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
        $maquinas = DB::table('maquinas')->select('maquinas.id')->where('equipamento_id',"=",$this->equipamento->id)->get();
        if(count($maquinas) == 0){
            $this->equipamento->delete();
            return redirect()->route('equipamentos.index')->with('status', 'Equipamento deletado com sucesso!');
        }
        return redirect()->route('equipamentos.index')->with('status', 'Equipamento não pode ser excluído, existe máquinas vinculadas a ele!');
    }
}

