<x-auth>
    <x-slot name="title">
        Equipamentos
    </x-slot>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="organosoft-list">
            @foreach ($equipamentos as $equipamento)
                <div class="organosoft-list__item">
                    <div class="w-5/6 flex flex-wrap">
                        <a href="{{route('equipamentos.show', $equipamento)}}" class="flex w-full text-primary text-3xl font-bold">{{$equipamento->nome}}</a>
                        <p class="text-sm text-gray-500">{{$equipamento->data_compra}}</p>
                    </div>
                    <div class="flex place-items-center">
                        <a class="mr-2 w-6" href="{{route('equipamentos.edit', $equipamento)}}" title="Editar equipamento">
                            <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                        </a>
                        <livewire:deletar-equipamento :equipamento="$equipamento" :tipo="'icon'">
                    </div>
                </div>
                <hr class="mb-2">
            @endforeach
        </div>
    </x-slot>
    <x-slot name="side_content">
        <x-link href="{{route('equipamentos.create')}}">
            <img src="{{asset('img/plus-white.svg')}}" alt="icon plus">
            Adicionar equipamentos
        </x-link>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
    </x-slot>
</x-auth>
