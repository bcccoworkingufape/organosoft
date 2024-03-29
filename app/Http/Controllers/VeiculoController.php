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

        $this->authorizeResource(Veiculo:: class, 'veiculo');
    }


    public function index()
    {
        $veiculos = auth()->user()->fabrica()->first()->veiculos()->get();

        return view('veiculo.index', compact('veiculos'));
    }

    public function create()
    {
        $categorias = auth()->user()->fabrica()->first()->categoriaVeiculos()->get();
        return view('veiculo.create', compact('categorias'));
    }

    public function store(StoreVeiculoRequest $request)
    {
        $veiculo = new Veiculo($request->validated());
        $veiculo->fabrica()->associate(auth()->user()->fabrica_id);
        $veiculo->save();
        return redirect()->route('veiculos.create')->withStatus("Veículo salvo com sucesso!");
    }

    public function edit(Veiculo $veiculo)
    {
        $categorias = auth()->user()->fabrica()->first()->categoriaVeiculos()->get();
        return view('veiculo.edit', compact('veiculo', 'categorias'));
    }

    public function update(UpdateVeiculoRequest $request, Veiculo $veiculo)
    {
        $veiculo->marca = $request->marca;
        $veiculo->modelo = $request->modelo;
        $veiculo->placa = $request->placa;
        $veiculo->chassi = $request->chassi;
        $veiculo->ano = $request->ano;
        $veiculo->categorias_veiculos_id = $request->categorias_veiculos_id;

        $veiculo->update();
        $veiculo->save();

        return redirect()->route('veiculos.edit', $veiculo)->withStatus("Veículo atualizado com sucesso!");;
    }

    public function show(Veiculo $veiculo)
    {
        $categorias = auth()->user()->categoriaVeiculos;
        return view('veiculo.show', compact('veiculo', 'categorias'));
    }

    public function deletar($identifier)
    {
        $this->veiculos->find($identifier)->delete();
        return redirect()->route('veiculos');
    }
}
