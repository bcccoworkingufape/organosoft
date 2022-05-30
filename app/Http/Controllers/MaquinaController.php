<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina;
use App\Models\Fabrica;
use App\Models\Equipamento;

use App\Http\Requests\StoreMaquinaRequest;
use App\Http\Requests\UpdateMaquinaRequest;


class MaquinaController extends Controller
{

    public function __construct()
    {

        $this->authorizeResource(Maquina:: class, 'maquina');
    }


    public function index()
    {
        $maquinas = Maquina::where('fabrica_id', auth()->user()->fabrica_id)->get();

        return view('maquina.index', compact('maquinas'));
    }

    public function create()
    {

        $fabrica = Fabrica::where('id', auth()->user()->fabrica_id)->first();
        $equipamentos = Equipamento::where('fabrica_id', auth()->user()->fabrica_id)->get();
        return view('maquina.create', compact('equipamentos', 'fabrica'));
    }

    public function store(StoreMaquinaRequest $request)
    {

        $maquina = new Maquina($request->validated());
        $maquina->save();
        return redirect()->route('maquinas.create')->withStatus("Máquina salva com sucesso!");
    }

    public function edit(Maquina $maquina)
    {
        $fabrica = Fabrica::where('id', auth()->user()->fabrica_id)->first();
        $equipamentos = Equipamento::where('fabrica_id', auth()->user()->fabrica_id)->get();
        return view('maquina.edit', compact('maquina', 'equipamentos', 'fabrica'));
    }

    public function update(UpdateMaquinaRequest $request, Maquina $maquina)
    {

        $maquina->marca = $request->marca;
        $maquina->modelo = $request->modelo;
        $maquina->placa = $request->placa;
        $maquina->chassi = $request->chassi;
        $maquina->ano = $request->ano;
        $maquina->equipamento_id = $request->equipamento_id;
        $maquina->fabrica_id = $request->fabrica_id;
        $maquina->update();
        $maquina->save();

        return redirect()->route('maquinas.edit', $maquina)->withStatus("Máquina atualizada com sucesso!");;
    }

    public function show(Maquina $maquina)
    {
        $fabrica = Fabrica::where('id', auth()->user()->fabrica_id)->first();
        $equipamentos = Equipamento::where('fabrica_id', auth()->user()->fabrica_id)->get();
        return view('maquina.show', compact('maquina', 'equipamentos', 'fabrica'));
    }

    public function deletar($identifier)
    {
        $this->maquinas->find($identifier)->delete();
        return redirect()->route('maquinass');
    }
}
