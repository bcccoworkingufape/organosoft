<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEquipamentoRequest;
use App\Http\Requests\UpdateEquipamentoRequest;
class EquipamentoController extends Controller
{
    public function __construct()
    {

        $this->authorizeResource(Equipamento:: class, 'equipamento');
    }


    public function index()
    {
        $equipamentos = auth()->user()->equipamentos;

        return view('equipamento.index', compact('equipamentos'));
    }

    public function create()
    {

        return view('equipamento.create');
    }

    public function store(StoreEquipamentoRequest $request)
    {
        $fabricas = auth()->user()->fabricas;
        $equipamento = new Equipamento($request->validated());
        $equipamento->fabricas_id = $fabricas[0]->id;
        $equipamento->user()->associate($request->user());
        $equipamento->save();
        return redirect()->route('equipamentos.create')->withStatus("Equipamento salvo com sucesso!");
    }

    public function edit(Equipamento $equipamento)
    {
        return view('equipamento.edit', compact('equipamento'));
    }

    public function update(UpdateEquipamentoRequest $request, Equipamento $equipamento)
    {
        $fabricas= auth()->user()->fabricas;
        $equipamento->nome = $request->nome;
        $equipamento->data_compra = $request->data_compra;
        $equipamento->fabricas_id = $fabricas[0]->id;

        $equipamento->update();
        $equipamento->save();

        return redirect()->route('equipamentos.edit', $equipamento)->withStatus("Equipamento atualizado com sucesso!");;
    }

    public function show(Equipamento $equipamento)
    {
        return view('equipamento.show', compact('equipamento'));
    }

    public function deletar($identifier)
    {
        $this->equipamentos->find($identifier)->delete();
        return redirect()->route('equipamentos');
    }
}
