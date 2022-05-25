<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\Veiculo;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioVeiculos extends Component
{
    // Flag to show modal
    public $show;

    // Lista de categorias
    public $categorias;
    
    // Form inputs
    public $marca;
    public $modelo;
    public $chassi;
    public $placa;
    public $ano;
    public $categoriaVeiculo;

    public function mount() {
        $fabrica = auth()->user()->fabrica()->first();
        $this->categorias = $fabrica->categoriaVeiculos()->get();
    }

    public function render()
    {
        return view('livewire.relatorio-veiculos');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function exportar() {

        $fabrica = auth()->user()->fabrica()->first();
        $veiculos = DB::table('veiculos')
            ->join(
                'categoria_veiculos',
                'veiculos.categorias_veiculos_id', '=', 'categoria_veiculos.id')
            ->select(
                'veiculos.id', 
                'veiculos.marca',
                'veiculos.modelo',
                'veiculos.placa',
                'veiculos.chassi',
                'veiculos.ano',
                'categoria_veiculos.descricao',
                'veiculos.created_at');
                
        if ($this->marca != null) {
            $veiculos->where('marca', 'like', '%'.$this->marca.'%');
        }
        if ($this->modelo != null) {
            $veiculos->where('modelo', 'like', '%'.$this->modelo.'%');
        }
        if ($this->chassi != null) {
            $veiculos->where('chassi', 'like', '%'.$this->chassi.'%');
        }
        if ($this->placa != null) {
            $veiculos->where('placa', 'like', '%'.$this->placa.'%');
        }
        if ($this->ano != null) {
            $veiculos->where('ano', $this->ano);
        }
        if ($this->categoriaVeiculo != null) {
            $veiculos->where('categorias_veiculos_id', $this->categoriaVeiculo);
        }

        $veiculos = $veiculos->get();
        foreach($veiculos as $veiculo) {
            $veiculo->created_at = date('d/m/Y H:i:s', strtotime($veiculo->created_at));
        }

        $data = [
            'title' => 'Relatório Veículos',
            'date' => date('d/m/Y'),
            'subtitle' => 'Emitido em 23/05/2022',
            'columns' => [ 'ID', 'Marca', 'Modelo', 'Placa', 'Chassi', 'Ano', 'Categoria', 'Data da criação' ],
            'data' => $veiculos,
        ];
          
        $pdf = PDF::loadView('pdf-template', $data)->output();
    
        return response()->streamDownload( fn () => print($pdf), "teste.pdf");
    }
}
