<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Models\Contrato;
use App\Models\Produtor;
use Illuminate\Support\Facades\Storage;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produtor $produtor)
    {
        $contratos = Contrato::all();
        return view('produtores.contratos.index', compact('produtor', 'contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Produtor $produtor)
    {
        return view('contratos.create', compact('produtor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContratoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContratoRequest $request, Produtor $produtor)
    {
        $validated = $request->safe()->except(['arquivo', 'granjas', 'outro']);
        $path = $request->file('arquivo')->store("/contratos", 'public');
        if(!$path)
            return redirect()->back()->withErrors(['arquivo' => 'Falha ao salvar o arquivo']);
        $validated['caminho_documento'] = $path;
        if($validated['status'] == 'outro')
            $validated['status'] = $request->safe()->only('outro')['outro'];
        $contrato = new Contrato($validated);
        $contrato->produtor()->associate($produtor);
        $contrato->save();
        $contrato->granjas()->sync($request['granjas']);
        $contrato->save();
        return redirect()->back()->withStatus('Contrato salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        return view('contratos.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        return view('contratos.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContratoRequest  $request
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContratoRequest $request, Contrato $contrato)
    {
        $validated = $request->safe()->except(['arquivo', 'granjas', 'outro']);
        if($request->has('arquivo')) {
            $oldArquivo = $contrato->caminho_documento;
            $path = $request->file('arquivo')->store("/contratos", 'public');
            if(!$path)
                return redirect()->back()->withErrors(['arquivo' => 'Falha ao salvar o arquivo']);
            Storage::disk('public')->delete($oldArquivo);
            $validated['caminho_documento'] = $path;
        }
        if($validated['status'] == 'outro')
            $validated['status'] = $request->safe()->only('outro')['outro'];
        $contrato->fill($validated);
        $contrato->granjas()->sync($request['granjas']);
        $contrato->save();
        return redirect()->back()->withStatus('Contrato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        //
    }
}
