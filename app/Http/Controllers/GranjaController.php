<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGranjaRequest;
use App\Models\Endereco;
use App\Models\Granja;
use App\Models\Produtor;
use Illuminate\Http\Request;

class GranjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Produtor $produtor)
    {
        return view('granjas.create', compact('produtor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGranjaRequest $request, Produtor $produtor)
    {
        $granja = new Granja($request->validated());
        $endereco = new Endereco($request->safe()->only(['cep', 'cidade', 'estado', 'rua', 'bairro','numero','complemento','ponto_referencia']));
        $endereco->save();
        $granja->endereco_id = $endereco->id;
        $granja->quant_aves = $request->quant_aves;
        $granja->produtores_id =  $produtor->id;
        $granja->save();

       return view('produtores.show', compact('produtor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function show(Granja $granja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function edit(Granja $granja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Granja $granja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Granja $granja)
    {
        //
    }
}
