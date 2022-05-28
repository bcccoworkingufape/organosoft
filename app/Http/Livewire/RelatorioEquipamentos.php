<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\Equipamento;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioEquipamentos extends Component
{
    // Flag to show modal
    public $show;

    public function render()
    {
        return view('livewire.relatorio-equipamentos');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function exportar() {

        $fabrica = auth()->user()->fabrica()->first();
        $equipamentos = DB::table('equipamentos')
            ->where('fabrica_id', $fabrica->id)
            ->select(
                'equipamentos.id',
                'equipamentos.nome',
                'equipamentos.data_compra',
                'equipamentos.created_at');

        $equipamentos = $equipamentos->get();
        foreach($equipamentos as $equipamento) {
            $equipamento->created_at = date('d/m/Y H:i:s', strtotime($equipamento->created_at));
        }

        $data = [
            'title' => 'Relatório Cat. Veículos',
            'date' => date('d/m/Y'),
            'subtitle' => 'Emitido em 23/05/2022',
            'columns' => [ 'ID', 'Nome', 'Data da Compra', 'Data da criação' ],
            'data' => $equipamentos,
        ];

        $pdf = PDF::loadView('pdf-template', $data)->output();

        return response()->streamDownload( fn () => print($pdf), "relatório de equipamentos.pdf");
    }
}
