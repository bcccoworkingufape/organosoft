<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\Veiculo;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioProdutores extends Component
{
    // Flag to show modal
    public $show;

    // Form inputs
    public $cidade;
    
    public function mount() {
        
    }

    public function render()
    {
        return view('livewire.relatorio-produtores');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function exportar() {
        $produtores = DB::table('produtores')
            ->join(
                'enderecos',
                'produtores.endereco_id', '=', 'enderecos.id'
                
            )
            ->where(
                'enderecos.cidade', '=', $this->cidade
            )
            ->select(
                'produtores.id',
                'produtores.nome',
                'produtores.cnpj',
                'produtores.telefone',
                'produtores.email',
            );
            $produtores = $produtores->get();


        $data = [
            'title' => 'Relatório Produtores',
            'date' => date('d/m/Y'),
            'subtitle' => 'Emitido em 23/05/2022',
            'columns' => [ 'ID', 'Nome', 'CNPJ', 'Telefone', 'Email'],
            'data' => $produtores,
        ];

        $pdf = PDF::loadView('pdf-template', $data)->output();

        return response()->streamDownload( fn () => print($pdf), "relatório de produtores.pdf");
    }
}
