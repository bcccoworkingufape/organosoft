<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGranjaRequest;
use App\Http\Requests\UpdateGranjaRequest;
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
    public function index($produtor)
    {
        $produtor = Produtor::find($produtor);
        $granjas = $produtor->granjas;

        //dd($granjas);
        return view('granjas.index', compact('produtor','granjas'));
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
        $granja->produtor_id =  $produtor->id;
        $granja->save();
        $granjas = $produtor->granjas;

       return view('granjas.index', compact('produtor', 'granjas'))->with(['status', 'Granja cadastrada com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function show(Granja $granja)
    {
        return view('granjas.show', compact('granja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function edit(Granja $granja)
    {
        return view('granjas.edit', compact('granja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Granja  $granja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGranjaRequest $request, Granja $granja)
    {
        $granja->fill($request->validated());
        $endereco = $granja->endereco;
        $endereco->fill($request->safe()->only(['cep', 'cidade', 'estado', 'rua', 'bairro','numero','complemento','ponto_referencia']));
        $endereco->save();
        $granja->save();
        return redirect()->route('granjas.edit', $granja)->withStatus('Edição de granja feita com sucesso!');
    }

}
