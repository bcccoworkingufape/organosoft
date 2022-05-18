<x-auth>
    <x-slot name="title">
    </x-slot>
    <x-slot name="bg_main">
        <div class="organosoft-vehicle-details">
            <div class="organosoft-vehicle-details__icon">
                <img src="{{asset('img/car.svg')}}" alt="link editar">
            </div>
            <div class="organosoft-vehicle-details__info">
                <a href="{{route('equipamentos.show', $equipamento)}}" class="flex w-full text-primary text-3xl font-bold">{{$equipamento->nome}}</a>
                <p class="text-sm text-gray-500">{{$equipamento->data_compra}}</p>
            </div>
        </div>
        <x-slot name="bottom_buttons">
            <x-link href="{{route('equipamentos.edit', $equipamento)}}" >
                <img src="{{asset('img/pencil-white.svg')}}" alt="link editar">
                Editar Cadastro
            </x-link>
            <livewire:deletar-equipamento :equipamento="$equipamento" :cor="'white'">
        </x-slot>
    </x-slot>
    <x-slot name="side_content">
        <x-card></x-card>
        <x-card></x-card>
        <x-card></x-card>
    </x-slot>

</x-auth>
