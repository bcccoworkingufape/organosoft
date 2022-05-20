<x-auth>
    <x-slot name="title">
    </x-slot>
    <x-slot name="bg_main">
        <div class="organosoft-vehicle-details">
           
            <div class="organosoft-vehicle-details__info">
                <a href="{{route('espacosFabrica.show', $espacoFabrica)}}" class="flex w-full text-primary text-3xl font-bold">{{$espacoFabrica->nome}}</a>
                <p>{{ $espacoFabrica->tipoItemEspacoFabrica()->first()->nome }}</p>
                <p>{{ $espacoFabrica->observacoes }}</p>
                <p>{{ $espacoFabrica->largura }} X {{ $espacoFabrica->altura }} X {{ $espacoFabrica->comprimento }}</p>
            </div>
        </div>
        <x-slot name="bottom_buttons">
            <x-link href="{{route('espacosFabrica.edit', $espacoFabrica)}}" >
                <img src="{{asset('img/pencil-white.svg')}}" alt="link editar">
                Editar Cadastro
            </x-link>
            <livewire:deletar-espacos-fabrica :espacosFabrica="$espacoFabrica" :cor="'white'">
        </x-slot>
    </x-slot>
    <x-slot name="side_content">
        <x-card></x-card>
        <x-card></x-card>
        <x-card></x-card>
    </x-slot>

</x-auth>
