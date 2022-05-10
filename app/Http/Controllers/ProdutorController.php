<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutorRequest;
use App\Http\Requests\UpdateProdutorRequest;
use App\Models\Endereco;
use App\Models\Produtor;

class ProdutorController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Produtor::class, 'produtor');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtores = auth()->user()->produtores;
        return view('produtores.index', compact('produtores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutorRequest $request)
    {
        $produtor = new Produtor($request->validated());
        $endereco = new Endereco($request->safe()->only(['cep', 'cidade', 'estado', 'rua', 'bairro','numero','complemento','ponto_referencia']));
        $endereco->save();
        $produtor->endereco_id = $endereco->id;
        $produtor->user()->associate($request->user());
        $produtor->save();
        return redirect()->route('produtores.create')->withStatus('Produtor salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtor  $produtor
     * @return \Illuminate\Http\Response
     */
    public function show(Produtor $produtor)
    {
        return view('produtores.show', compact('produtor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtor  $produtor
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtor $produtor)
    {
        return view('produtores.edit', compact('produtor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutorRequest  $request
     * @param  \App\Models\Produtor  $produtor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutorRequest $request, Produtor $produtor)
    {
        $produtor->fill($request->validated());
        $endereco = $produtor->endereco;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->estado = $request->estado;
        $endereco->cidade = $request->cidade;
        $endereco->complemento = $request->complemento;
        $endereco->ponto_referencia = $request->ponto_referencia;
        $endereco->update();
        $produtor->save();

        return redirect()->route('produtores.edit', $produtor)->withStatus('Produtor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtor  $produtor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtor $produtor)
    {
        //
    }
}
