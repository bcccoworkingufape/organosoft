<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\CategoriaVeiculo;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioCategoriaVeiculos extends Component
{
    // Flag to show modal
    public $show;

    public function render()
    {
        return view('livewire.relatorio-categoria-veiculos');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function exportar() {

        $fabrica = auth()->user()->fabrica()->first();
        $categoriaVeiculos = DB::table('categoria_veiculos')
            ->where('fabrica_id', $fabrica->id)
            ->select(
                'categoria_veiculos.id',
                'categoria_veiculos.descricao',
                'categoria_veiculos.created_at');

        $categoriaVeiculos = $categoriaVeiculos->get();
        foreach($categoriaVeiculos as $categoria) {
            $categoria->created_at = date('d/m/Y H:i:s', strtotime($categoria->created_at));
        }

        $data = [
            'title' => 'Relatório Cat. Veículos',
            'date' => date('d/m/Y'),
            'subtitle' => 'Emitido em 23/05/2022',
            'columns' => [ 'ID', 'Descrição', 'Data da criação' ],
            'data' => $categoriaVeiculos,
        ];

        $pdf = PDF::loadView('pdf-template', $data)->output();

        return response()->streamDownload( fn () => print($pdf), "relatório de categoria veículos.pdf");
    }
}
