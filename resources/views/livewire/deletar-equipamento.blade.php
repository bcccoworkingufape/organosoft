<div>
    @switch($tipo)
        @case('icon')
            <a wire:click="toggleModal" href="#" title="Deletar equipamento">
                @switch($cor)
                    @case('white')
                        <img src="{{asset('img/trash-white.svg')}}" class="w-6" alt="botao deletar">
                        @break
                    @case('primary')
                    @default
                        <img src="{{asset('img/trash-primary.svg')}}" class="w-6" alt="botao deletar">
                    @break
                @endswitch
            </a>
            @break
        @default
            <x-button wire:click.prevent="toggleModal">
                @switch($cor)
                    @case('white')
                        <img src="{{asset('img/trash-white.svg')}}" class="w-6 mr-1" alt="botao deletar">
                        @break
                    @case('primary')
                    @default
                        <img src="{{asset('img/trash-primary.svg')}}" class="w-6 mr-1" alt="botao deletar">
                        @break
                @endswitch
                Deletar equipamento
            </x-button>
            @break
    @endswitch



    <x-jet-confirmation-modal wire:model="show">
        <x-slot name="title">Confirmar ação</x-slot>
        <x-slot name="content">Tem certeja que deseja deletar esse equipamento?</x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-600 hover:bg-red-700" wire:click.prevent="toggleModal" wire:loading.attr="disabled">
                Cancelar
            </x-button>
            <x-button class="ml-2" wire:click.prevent="deletar" wire:loading.attr="disabled">
                Deletar equipamento
            </x-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
