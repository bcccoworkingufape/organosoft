<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\EspacosFabrica;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioEspacosFabrica extends Component
{
    // Flag to show modal
    public $show;

    // Lista de tipos de itens espácos fábricas
    public $tiposItensEspacosFabrica;

    // Form inputs
    public $tipoItemEspacoFabrica;

    public function mount() {
        $fabrica = auth()->user()->fabrica()->first();
        $this->tiposItensEspacosFabrica = $fabrica->tipoItemEspacoFabricas()->get();
    }

    public function render()
    {
        return view('livewire.relatorio-espacos-fabrica');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function exportar() {

        $fabrica = auth()->user()->fabrica()->first();
        $espacosFabrica = DB::table('espacos_fabricas')
            ->join(
                'tipo_item_espaco_fabrica',
                'espacos_fabricas.tipo_item_espaco_fabrica_id', '=', 'tipo_item_espaco_fabrica.id')
            ->select(
                'espacos_fabricas.id',
                'espacos_fabricas.nome',
                'tipo_item_espaco_fabrica.nome as nomeTipoItemEspacoFabrica',
                'espacos_fabricas.observacoes',
                'espacos_fabricas.largura',
                'espacos_fabricas.comprimento',
                'espacos_fabricas.altura',
                'espacos_fabricas.created_at');

        if ($this->tipoItemEspacoFabrica != null) {
            $espacosFabrica->where('tipo_item_espaco_fabrica_id', $this->tipoItemEspacoFabrica);
        } else {
            $espacosFabrica->where('espacos_fabricas.fabrica_id', $fabrica->id);
        }

        $espacosFabrica = $espacosFabrica->get();
        foreach($espacosFabrica as $espacoFabrica) {
            $espacoFabrica->created_at = date('d/m/Y H:i:s', strtotime($espacoFabrica->created_at));
        }

        $data = [
            'title' => 'Relatório Esp. Fábrica',
            'date' => date('d/m/Y'),
            'subtitle' => 'Emitido em 23/05/2022',
            'columns' => [ 'ID', 'Nome', 'Tipo de Item', 'Observações', 'Largura', 'Comprimento', 'Altura', 'Data da criação' ],
            'data' => $espacosFabrica,
        ];

        $pdf = PDF::loadView('pdf-template', $data)->output();

        return response()->streamDownload( fn () => print($pdf), "relatório de espaços fábrica.pdf");
    }
}
