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
        $fabricas = auth()->user()->fabricas;
        return view('equipamento.create', compact('fabricas'));
    }

    public function store(StoreEquipamentoRequest $request)
    {
        $equipamento = new Equipamento($request->validated());
        $equipamento->user()->associate($request->user());
        $equipamento->save();
        return redirect()->route('equipamentos.create')->withStatus("Equipamento salvo com sucesso!");
    }

    public function edit(Equipamento $equipamento)
    {
        $fabricas = auth()->user()->fabricas;
        return view('equipamento.edit', compact('equipamento', 'fabricas'));
    }

    public function update(UpdateEquipamentoRequest $request, Equipamento $equipamento)
    {
        $equipamento->nome = $request->nome;
        $equipamento->data_compra = $request->data_compra;
        $equipamento->fabricas_id = $request->fabricas_id;

        $equipamento->update();
        $equipamento->save();

        return redirect()->route('equipamentos.edit', $equipamento)->withStatus("Equipamento atualizado com sucesso!");;
    }

    public function show(Equipamento $equipamento)
    {
        $fabricas = auth()->user()->fabricas;
        return view('equipamento.show', compact('equipamento', 'equipamentos'));
    }

    public function deletar($identifier)
    {
        $this->equipamentos->find($identifier)->delete();
        return redirect()->route('equipamentos');
    }
}
