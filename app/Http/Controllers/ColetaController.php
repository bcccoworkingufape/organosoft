<?php

namespace App\Http\Controllers;
use App\Models\Granja;
use App\Models\Coleta;
use App\Models\QualidadeColeta;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ColetaController extends Controller
{
    public function index($granja_id)
    {
        $granja = Granja::find($granja_id);
        $coletas = Coleta::where('id_granja', $granja_id);
        return view('Coletas.index', ['coletas' => $coletas]);
    }

    public function show($granja_id)
    {
        $granja = Granja::find($granja_id);
        $coletas = Coleta::where('id_granja', $granja_id)->get();
        return view('Coletas.show', ['coletas' => $coletas]);
    }

    public function view($coleta_id)
    {
        $qualidade = QualidadeColeta::where('id_coleta',$coleta_id)->get();
        $coleta = Coleta::find($coleta_id);
        if(sizeof($qualidade)){
            $qualidade = $qualidade[0]['id'];
        }else{
            $qualidade = 0;
        }
        return view('Coletas.view', ['coleta' => $coleta, 'qualidade' => $qualidade]);
    }

    public function edit($coleta_id)
    {
        $coleta = Coleta::find($coleta_id);
        return view('Coletas.edit', ['coleta' => $coleta]);
    }

    public function store(Request $request, $coleta_id)
    {
        $validated = $request->validate([
            'hora' => 'required',
            'data' => 'required',
        ]);
        
        $dados = $request->all();
        //dd($dados['data']);
        $coleta = Coleta::find($coleta_id);
        
        $coleta->status = 'status 1';
        $coleta->hora = $dados['hora'];
        $coleta->data = $dados['data'];
        $coleta->save();

        return redirect()->back();
        return view('Coletas.edit', ['coleta' => $coleta]);
    }
    
    public function pCreate($granja)
    {

        return view('Coletas.create', ['granja' => $granja]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'hora' => 'required',
            'data' => 'required',
        ]);
        $dados = $request->all();
        $dados['status'] = 'status 1';
        $coleta = Coleta::create($dados);

        return redirect()->back();
    }
}
