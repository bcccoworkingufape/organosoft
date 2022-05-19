<x-auth>
    <x-slot name="title">
    </x-slot>
    <x-slot name="bg_main">
        <div class="organosoft-maquina-details">
            <div class="organosoft-maquina-details__info">
                <a href="{{route('maquinas.show', $maquina)}}" class="flex w-full text-primary text-3xl font-bold">{{$maquina->marca}}</a>
                <p class="text-sm text-gray-500">{{$maquina->placa}}</p>
            </div>
        </div>
        <x-slot name="bottom_buttons">
            <x-link href="{{route('maquinas.edit', $maquina)}}" >
                <img src="{{asset('img/pencil-white.svg')}}" alt="link editar">
                Editar Cadastro
            </x-link>
            <livewire:deletar-maquina :maquina="$maquina" :cor="'white'">
        </x-slot>
    </x-slot>
    <x-slot name="side_content">
        <x-card></x-card>
        <x-card></x-card>
        <x-card></x-card>
    </x-slot>

</x-auth>
