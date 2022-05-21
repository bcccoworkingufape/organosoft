<?php

namespace App\Http\Controllers;
use App\Models\QualidadeColeta;

use Illuminate\Http\Request;

class QualidadeColetaController extends Controller
{
    public function view($qualidade_id)
    {
        $qualidade = QualidadeColeta::find($qualidade_id);
        return view('avaliacaoColeta.view', ['qualidade' => $qualidade]);
    }

    public function pCreate($coleta_id){
        return view('avaliacaoColeta.create', ['coleta_id' => $coleta_id]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'descricao' => 'required',
            'avaliacaoQualidade' => 'required',
        ]);
        $dados = $request->all();
        $dados['id_coleta'] = $request['coleta_id'] ;
        $qualidade = QualidadeColeta::create($dados);

        return redirect()->route('coleta.view',$request['coleta_id']);
    }

    public function edit($qualidade_id)
    {
        $qualidade = QualidadeColeta::find($qualidade_id);
        return view('avaliacaoColeta.edit', ['qualidade' => $qualidade]);
    }

    public function store(Request $request, $qualidade_id)
    {
        $validated = $request->validate([
            'descricao' => 'required',
            'avaliacaoQualidade' => 'required',
        ]);
        
        $dados = $request->all();
        //dd($dados['data']);
        $qualidade = QualidadeColeta::find($qualidade_id);
        
        $qualidade->descricao = $dados['descricao'];
        $qualidade->avaliacaoQualidade = $dados['avaliacaoQualidade'];
        $qualidade->save();

        return redirect()->route('coleta.view',$qualidade['id_coleta']);
    }

}
