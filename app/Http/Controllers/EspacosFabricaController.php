<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabrica;
use App\Models\EspacosFabrica;
use App\Models\TipoItemEspacoFabrica;
use App\Http\Requests\StoreEspacosFabricaRequest;
use App\Http\Requests\UpdateEspacosFabricaRequest;

class EspacosFabricaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(EspacosFabrica::class, 'espacosFabrica');
    }

    public function index()
    {
        $fabrica = auth()->user()->fabrica()->first();
        $espacosFabricas = EspacosFabrica::where('fabrica_id', $fabrica->id)->get();
        return view('espacosFabrica.index', compact('espacosFabricas'));
    }

    public function create()
    {
        $fabrica = auth()->user()->fabrica()->first();
        $tipoItemEspacoFabricas = TipoItemEspacoFabrica::where('fabricas_id', $fabrica->id)->get();
        return view('espacosFabrica.create', compact('tipoItemEspacoFabricas'));
    }

    public function store(StoreEspacosFabricaRequest $request)
    {
        $fabrica = auth()->user()->fabrica()->first();
        $espacosFabrica = new EspacosFabrica($request->validated());
        $espacosFabrica->fabrica()->associate($fabrica->id);
        $espacosFabrica->save();
        return redirect()->route('espacosFabrica.create')->withStatus('Espaço da fábrica salvo com sucesso!');
    }

    public function edit(EspacosFabrica $espacosFabrica)
    {
        $fabrica = auth()->user()->fabrica()->first();
        $tipoItemEspacoFabricas = TipoItemEspacoFabrica::where('fabricas_id', $fabrica->id)->get();
        return view('espacosFabrica.edit', compact('espacosFabrica', 'tipoItemEspacoFabricas'));
    }

    public function update(UpdateEspacosFabricaRequest $request, EspacosFabrica $espacosFabrica)
    {
        $espacosFabrica->nome = $request->nome;
        $espacosFabrica->tipo_item_espaco_fabrica_id = $request->tipo_item_espaco_fabrica_id;
        $espacosFabrica->observacoes = $request->observacoes;
        $espacosFabrica->largura = $request->largura;
        $espacosFabrica->altura = $request->altura;
        $espacosFabrica->comprimento = $request->comprimento;
        $espacosFabrica->update();
        $espacosFabrica->save();

        return redirect()->route('espacosFabrica.edit', $espacosFabrica)->withStatus("Espaço da fábrica atualizado com sucesso!");
    }
    
    public function show(EspacosFabrica $espacosFabrica)
    {
        $espacoFabrica = $espacosFabrica;
        return view('espacosFabrica.show', compact('espacoFabrica'));
    }

    public function deletar($identifier)
    {
        $this->espacosFabricas->find($identifier)->delete();
        return redirect()->route('espacosFabricas');
    }

}
