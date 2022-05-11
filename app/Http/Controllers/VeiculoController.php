<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Http\Requests\StoreVeiculoRequest;
use App\Http\Requests\UpdateVeiculoRequest;


class VeiculoController extends Controller
{

    public function __construct()
    {

        // $this->authorizeResource(Veiculo:: class, 'veiculo');
    }


    public function index()
    {
        $veiculos = auth()->user()->veiculos;

        return view('veiculo.index', compact('veiculos'));
    }

    public function create()
    {
        return view('veiculo.create');
    }

    public function store(StoreVeiculoRequest $request)
    {
        $veiculo = new Veiculo($request->validated());
        $veiculo->user()->associate($request->user());
        $veiculo->save();
        return redirect()->route('veiculos.create')->withStatus("Veículo salvo com sucesso!");
    }

    public function edit(Veiculo $veiculo)
    {
        return view('veiculo.edit', compact('veiculo'));
    }

    public function update(UpdateVeiculoRequest $request, veiculo $veiculo)
    {
        $veiculo->marca = $request->marca;
        $veiculo->placa = $request->placa;
        $veiculo->chassi = $request->chassi;
        $veiculo->ano = $request->ano;
        $veiculo->categorias_veiculos_id = $request->categorias_veiculos_id;

        $veiculo->update();
        $veiculo->save();

        return redirect()->route('veiculos.edit', $veiculo)->withStatus("Veículo atualizado com sucesso!");;
    }

    public function show(veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }

    public function deletar($identifier)
    {
        $this->veiculos->find($identifier)->delete();
        return redirect()->route('veiculos');
    }
}
