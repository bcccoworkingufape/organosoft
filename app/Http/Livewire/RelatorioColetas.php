<?php

namespace App\Http\Livewire;

use PDF;
use Livewire\Component;
use App\Models\Veiculo;
use App\Models\Produtor;
use App\Models\Granja;
use App\Models\Coleta;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PDFController;

class RelatorioColetas extends Component
{
    // Flag to show modal
    public $show;

    // Listas pra o front
    public $produtores;
    public $granjas;
    public $status;
    public $id_produtores;

    // Form inputs
    public $produtor;
    public $cidade;
    public $estado;
    public $granja;
    public $coleta_status;

    public function mount() {
        // retorna todos produtores
        $user = auth()->user()->id;
        $this->produtores = Produtor::where('user_id', $user)->get();
        
        //retorna todas granjas
        $id_produtores = [];
        foreach ($this->produtores as $p){
            array_push($id_produtores, $p->id);
        }
        $this->granjas = Granja::whereIn('produtor_id', $id_produtores)->get();
        //retorna todos status
        $this->status = Coleta::all()->unique('status');
    }

    public function render()
    {
        return view('livewire.relatorio-coletas');
    }

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    

    public function exportar() {
        $data = "";
        $granjas = "";
        $coletas = "";
        if(!empty($this->coleta_status)){
            $coletas = $this->selectStatus();
            $coletas = $coletas->get();
            $data = [
                'title' => 'Relatório Status',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => ['Nome Granja', 'Coleta Data', 'Coleta Hora', 'Coleta Status'],
                'data' => $coletas,
            ];
            //dd($this->coleta_status);
        }
        else if(!empty($this->granja)){
            $coletas = $this->selectGranja();
            $coletas = $coletas->get();
            $data = [
                'title' => 'Relatório Granjas',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => ['Nome Granja', 'Coleta Data', 'Coleta Hora', 'Coleta Status'],
                'data' => $coletas,
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
            $coletas = $this->selectProdutor();
            $coletas = $coletas->get();
            $data = [
                'title' => 'Relatório Granjas',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => ['Nome Produtor', 'Nome Granja', 'Coleta Data', 'Coleta Hora', 'Coleta Status'],
                'data' => $coletas,
            ];

        }
        else{
            $coletas = $this->selectTodasColetas();
            $coletas = $coletas->get();
            $data = [
                'title' => 'Relatório Coletas',
                'date' => date('d/m/Y'),
                'subtitle' => 'Emitido em 23/05/2022',
                'columns' => ['Nome Granja', 'Coleta Data', 'Coleta Hora', 'Coleta Status'],
                'data' => $coletas,
            ];
            
        }
        $pdf = PDF::loadView('pdf-template', $data)->output();

        return response()->streamDownload( fn () => print($pdf), "relatório de coletas.pdf");
    }

    //SELECT * FROM `coletas` 
    //inner join granjas
    //on granjas.id = coletas.id_granja
    //inner join produtores
    //on produtores.id = granjas.produtor_id
    //WHERE coletas.status in ('status 1', 'status 2');
    public function selectStatus(){
        $coletas = DB::table('coletas')
            ->join(
                'granjas',
                'coletas.id_granja', '=', 'granjas.id'
            )
            ->join(
                'produtores',
                'granjas.produtor_id', '=', 'produtores.id'
            )
            ->where(
                'coletas.status', '=', $this->coleta_status
            )
            ->select(
                'granjas.nome as gn',
                'coletas.data',
                'coletas.hora',
                'coletas.status',
            );
        return $coletas;
    }

    public function selectTodasColetas(){
        $coletas = DB::table('coletas')
            ->join(
                'granjas',
                'coletas.id_granja', '=', 'granjas.id'
            )
            ->select(
                'granjas.nome as gn',
                'coletas.data',
                'coletas.hora',
                'coletas.status',
            );
        return $coletas;
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

    //SELECT * FROM coletas inner join granjas on granjas.id = coletas.id_granja where granjas.id = 1;
    public function selectGranja(){
        $coletas = DB::table('coletas')
            ->join(
                'granjas',
                'coletas.id_granja', '=', 'granjas.id'
            )
            ->where(
                'granjas.id', '=', $this->granja
            )
            ->select(
                'granjas.nome as gn',
                'coletas.data',
                'coletas.hora',
                'coletas.status',
            );
        return $coletas;
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
        $coletas = DB::table('coletas')
        ->join(
            'granjas',
            'coletas.id_granja', '=', 'granjas.id'
        )
        ->join(
            'produtores',
            'granjas.produtor_id', '=', 'produtores.id'
        )
        ->where(
            'produtores.id', '=', $this->produtor
        )
        ->select(
            'produtores.nome as pn',
            'granjas.nome as gn',
            'coletas.data',
            'coletas.hora',
            'coletas.status',
        );
        return $coletas;
    }
}
