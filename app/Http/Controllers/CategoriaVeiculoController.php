<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaVeiculo;
use App\Http\Requests\StoreCategoriaVeiculoRequest;
use App\Http\Requests\UpdateCategoriaVeiculoRequest;

class CategoriaVeiculoController extends Controller
{
    
    public function __construct()
    {
        $this->authorizeResource(CategoriaVeiculo:: class, 'categoriaVeiculo');
    }

    public function index() 
    {
        $categoriaVeiculos = auth()->user()->categoriaVeiculos;
        return view('categoriaVeiculo.index', compact('categoriaVeiculos'));
    }

    public function create() 
    {
        return view('categoriaVeiculo.create');
    }

    public function store(StoreCategoriaVeiculoRequest $request)
    {
        $categoriaVeiculo = new CategoriaVeiculo($request->validated());
        $categoriaVeiculo->user()->associate($request->user());
        $categoriaVeiculo->save();
        return redirect()->route('categoriaVeiculos.create')->withStatus("Categoria de veículos salva com sucesso!");
    }

    public function edit(CategoriaVeiculo $categoriaVeiculo)
    {
        return view('categoriaVeiculo.edit', compact('categoriaVeiculo'));
    }

    public function update(StoreCategoriaVeiculoRequest $request, CategoriaVeiculo $categoriaVeiculo)
    {
        $categoriaVeiculo->descricao = $request->descricao;
        $categoriaVeiculo->update();
        $categoriaVeiculo->save();

        return redirect()->route('categoriaVeiculos.edit', $categoriaVeiculo)->withStatus("Categoria de veículos atualizada com sucesso!");;
    }

    public function show(CategoriaVeiculo $categoriaVeiculo)
    {
        return view('categoriaVeiculos.show', compact('categoriaVeiculo'));
    }

    public function deletar($identifier)
    {
        $this->categoriaVeiculos->find($identifier)->delete();
        return redirect()->route('categoriaVeiculos');
    }

}
