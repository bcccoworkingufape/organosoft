<?php

namespace App\Http\Livewire;

use App\Models\CategoriaVeiculo;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
        $veiculos = DB::table('veiculos')->select('veiculos.id')->where('categorias_veiculos_id',"=",$this->categoriaVeiculo->id)->get();
        if(count($veiculos) == 0){
            $this->categoriaVeiculo->delete();
            return redirect()->route('categoriaVeiculos.index')->with('status', 'Categoria de veículos deletada com sucesso!');
        }
        return redirect()->route('categoriaVeiculos.index')->with('status', 'Categoria de veículos não pode ser excluída, existe veículos vinculados a ela!');
    }
}
