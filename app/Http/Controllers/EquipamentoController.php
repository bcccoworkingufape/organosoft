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
        $fabrica = auth()->user()->fabrica()->first();
        $equipamentos = Equipamento::where('fabrica_id', $fabrica->id)->get();
        return view('equipamento.index', compact('equipamentos'));
    }

    public function create()
    {
        return view('equipamento.create');
    }

    public function store(StoreEquipamentoRequest $request)
    {
        $equipamento = new Equipamento($request->validated());
        $equipamento->fabrica_id = auth()->user()->fabrica_id;
        $equipamento->save();
        return redirect()->route('equipamentos.create')->withStatus("Equipamento salvo com sucesso!");
    }

    public function edit(Equipamento $equipamento)
    {
        return view('equipamento.edit', compact('equipamento'));
    }

    public function update(UpdateEquipamentoRequest $request, Equipamento $equipamento)
    {
        $equipamento->nome = $request->nome;
        $equipamento->data_compra = $request->data_compra;
        $equipamento->fabrica_id = auth()->user()->fabrica_id;

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
