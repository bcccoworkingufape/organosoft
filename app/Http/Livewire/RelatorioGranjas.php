<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\Veiculo;
use App\Models\Produtor;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioGranjas extends Component
{
    // Flag to show modal
    public $show;

    // Lista de produtores
    public $produtores;

    // Form inputs
    public $produtor;
    public $cidade;
    public $estado;
    public $granja;

    public function mount() {
        $user = auth()->user()->id;
        #dd($fabrica);
        $this->produtores = Produtor::where('user_id', $user)->get();# $fabrica->categoriaVeiculos()->get();
        #dd($this->produtores);
    }

    public function render()
    {
        return view('livewire.relatorio-granjas');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    

    public function exportar() {
        $data = "";
        $granjas = "";
        if(!empty($this->granja)){
            $granjas = $this->selectQuantidade();
            $granjas = $granjas->get();
            $data = [
                'title' => 'Relatório Granjas',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => [ 'ID Granja', 'Nome Granja', 'Quantidade Aves'],
                'data' => $granjas,
            ];
        }
        else if(!empty($this->estado)){
            $granjas = $this->selectEstado();
            $granjas = $granjas->get();
            $data = [
                'title' => 'Relatório Granjas',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => [ 'ID Granja', 'Nome Granja', 'Quantidade Aves', 'ID Endereço', 'CEP'],
                'data' => $granjas,
            ];
        }
        else if (!empty($this->produtor)){
            $granjas = $this->selectProdutor();
            $granjas = $granjas->get();
            $data = [
                'title' => 'Relatório Granjas',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => ['ID Produtor','Produtor Nome', 'ID Granja', 'Nome Granja', 'Quantidade Aves'],
                'data' => $granjas,
            ];

        }
        else{
            $granjas = $this->selectTodasGranjas();
            $granjas = $granjas->get();
            $data = [
                'title' => 'Relatório Granjas',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => ['ID Granja', 'Nome Granja', 'Quantidade Aves'],
                'data' => $granjas,
            ];
            
        }
        $pdf = PDF::loadView('pdf-template', $data)->output();

        return response()->streamDownload( fn () => print($pdf), "relatório de granjas.pdf");
    }

    public function selectTodasGranjas(){
        $granjas = DB::table('granjas')
            ->select(
                'granjas.id as gi',
                'granjas.nome as gn',
                'granjas.quant_aves',
            );
        return $granjas;
    }

    public function selectQuantidade(){
        $granjas = DB::table('granjas')
            
            ->where(
                'granjas.quant_aves', '>=', $this->granja
            )
            ->select(
                'granjas.id as gi',
                'granjas.nome as gn',
                'granjas.quant_aves',
            );
        return $granjas;
    }

    public function selectEstado(){
        //SELECT * FROM granjas inner join enderecos on enderecos.id = granjas.endereco_id WHERE enderecos.estado = 'PE';
        $granjas = DB::table('granjas')
            ->join(
                'enderecos',
                'granjas.endereco_id', '=', 'enderecos.id'
                
            )
            ->where(
                'enderecos.estado', '=', $this->estado
            )
            ->select(
                'granjas.id as gi',
                'granjas.nome as gn',
                'granjas.quant_aves',
                'enderecos.id as ei',
                'enderecos.cep as ec',
                
            );
        return $granjas;
    }

    public function selectProdutor(){
        $granjas = DB::table('granjas')
            ->join(
                'produtores',
                'granjas.produtor_id', '=', 'produtores.id'
                
            )
            ->where(
                'produtores.id', '=', $this->produtor
            )
            ->select(
                'produtores.id as pi',
                'produtores.nome as pn',
                'granjas.id as gi',
                'granjas.nome as gn',
                'granjas.quant_aves',
                
                
            );
        return $granjas;
    }
}
