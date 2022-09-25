<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\Maquina;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioMaquinas extends Component
{
    // Flag to show modal
    public $show;

    // Lista de equipamentos
    public $equipamentos;

    // Form inputs
    public $equipamento;

    public function mount() {
        $fabrica = auth()->user()->fabrica()->first();
        $this->equipamentos = $fabrica->equipamentos()->get();
    }

    public function render()
    {
        return view('livewire.relatorio-maquinas');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function exportar() {

        $fabrica = auth()->user()->fabrica()->first();
        $maquinas = DB::table('maquinas')
            ->join(
                'equipamentos',
                'maquinas.equipamento_id', '=', 'equipamentos.id')
            ->select(
                'maquinas.id',
                'maquinas.marca',
                'maquinas.modelo',
                'maquinas.placa',
                'maquinas.chassi',
                'maquinas.ano',
                'equipamentos.nome',
                'maquinas.created_at');

        if ($this->equipamento != null) {
            $maquinas->where('equipamento_id', $this->equipamento);
        } else {
            $maquinas->where('maquinas.fabrica_id', $fabrica->id);
        }

        $maquinas = $maquinas->get();
        foreach($maquinas as $maquina) {
            $maquina->created_at = date('d/m/Y H:i:s', strtotime($maquina->created_at));
        }

        $data = [
            'title' => 'Relatório Máquinas',
            'date' => date('d/m/Y'),
            'subtitle' => 'Emitido em 23/05/2022',
            'columns' => [ 'ID', 'Marca', 'Modelo', 'Placa', 'Chassi', 'Ano', 'Equipamento', 'Data da criação' ],
            'data' => $maquinas,
        ];

        $pdf = PDF::loadView('pdf-template', $data)->output();

        return response()->streamDownload( fn () => print($pdf), "relatório de máquinas.pdf");
    }
}
