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

        return response()->streamDownload( fn () => print($pdf), "relatório de veículos.pdf");
    }
}
