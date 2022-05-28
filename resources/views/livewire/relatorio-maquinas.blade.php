<div>
    <button wire:click.prevent="toggleModal" class="organosoft-reports-grid__item">
        <span class="icon">
          <img src="{{asset('img/machine-outline.svg')}}" alt="link relatório de máquinas">
        </span>
        <span class="title">
          Máquinas
        </span>
    </button>

    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">Relatório de Máquinas</x-slot>
        <x-slot name="content">
            <x-form wire:submit.prevent="exportar">
                <x-form-control class="w-full">
                    <x-label for="equipamento_id" value="Equipamento da Máquina:"></x-label>
                    <x-select name="equipamentos_maquinas_id" id="equipamentos_maquinas_id" wire:model="equipamento">
                        <option value="" selected>Todas</option>
                        @foreach($equipamentos as $equipamento)
                            <option value="{{ $equipamento->id }}">
                                {{ $equipamento->nome }}
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
