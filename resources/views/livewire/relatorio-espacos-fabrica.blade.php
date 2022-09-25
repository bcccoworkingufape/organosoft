<div>
    <button wire:click.prevent="toggleModal" class="organosoft-reports-grid__item">
        <span class="icon">
          <img src="{{asset('img/factory-spaces-outline.svg')}}" alt="link relatório de espaços fábrica">
        </span>
        <span class="title">
          Espaços da Fábrica
        </span>
    </button>

    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">Relatório de Espaços da Fábrica</x-slot>
        <x-slot name="content">
            <x-form wire:submit.prevent="exportar">
                <x-form-control class="w-full">
                    <x-label for="tipoItemEspacoFabrica_id" value="Tipo de Item Espaços Fábrica:"></x-label>
                    <x-select name="tipo_item_espacos_fabrica_id" id="tipo_item_espacos_fabrica_id" wire:model="tipoItemEspacoFabrica">
                        <option value="" selected>Todos</option>
                        @foreach($tiposItensEspacosFabrica as $tipoItemEspacoFabrica)
                            <option value="{{ $tipoItemEspacoFabrica->id }}">
                                {{ $tipoItemEspacoFabrica->nome }}
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
