<?php

namespace App\Http\Livewire;

use App\Models\Produtor;
use Livewire\Component;

class SelectMultipleGranjas extends Component
{
    public $granjas;
    public $filtradas;
    public $produtor;
    public $selecionadas;
    public $filtro;
    public $countSelecionadas;

    public function mount(Produtor $produtor, $old)
    {
        $this->produtor = $produtor;
        $this->granjas = $produtor->granjas;
        $this->filtradas = $this->granjas;
        $this->selecionadas = $this->granjas->mapWithKeys(fn($granja) => [$granja->id => $old && in_array($granja->id, $old)])->all();
        $this->countSelecionadas = count(array_filter($this->selecionadas, fn($selecionada) => $selecionada));
    }

    public function toggleSelecionado($id)
    {
        $this->selecionadas[$id] = !$this->selecionadas[$id];
        $this->countSelecionadas = count(array_filter($this->selecionadas, fn($selecionada) => $selecionada));
    }

    public function render()
    {
        return view('livewire.select-multiple-granjas');
    }

    public function updatedFiltro()
    {
        $this->filtradas = $this->granjas
            ->filter(fn($granja) => str_contains(strtolower($granja->nome), $this->filtro));
    }
}
