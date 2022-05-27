<div>
    <button wire:click.prevent="toggleModal" class="organosoft-reports-grid__item">
        <span class="icon">
          <img src="{{asset('img/car-outline.svg')}}" alt="link relatório de veículos">
        </span>
        <span class="title">
          Veículos
        </span>
    </button>

    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">Relatório de Veículos</x-slot>
        <x-slot name="content">
            <x-form wire:submit.prevent="exportar">
                <x-form-control class="w-full">
                    <x-label for="categoriaVeiculo_id" value="Categoria do Veículo:"></x-label>
                    <x-select name="categorias_veiculos_id" id="categorias_veiculos_id" wire:model="categoriaVeiculo">
                        <option value="" selected>Todas</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->descricao }}
                            </option>
                        @endforeach
                    </x-select>
                </x-form-control>
            </x-form>
        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-600 hover:bg-red-700" wire:click.prevent="toggleModal" wire:loading.attr="disabled">
                Cancelar
            </x-button>
            <x-button type="submit" class="ml-2" wire:click.prevent="exportar" wire:loading.attr="disabled">
                Gerar Relatório
            </x-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
