<x-auth>
    <x-slot name="title">
        Contratos do produtor {{$produtor->nome}}
    </x-slot>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        @foreach ($contratos as $contrato)
            <div class="flex flex-wrap w-full mb-4">
                <div class="w-5/6 flex flex-wrap">
                    <a href="{{route('contratos.show', $contrato)}}" class="w-full items-end flex flex-wrap">
                        <p class="text-primary text-3xl font-bold w-full">{{Str::plural('Granja', $contrato->granjas->count())}}:</p>
                        <p class="text-primary self-end">{{implode(', ', $contrato->granjas->map(fn($granja) => $granja->nome)->all())}}</p>
                    </a>
                    <p class="w-full text-sm text-gray-500">Status: {{$contrato->status}}</p>
                    <p class="text-sm text-gray-500">Contrato válido de {{($contrato->inicio->format('d/m/Y'))}} a {{$contrato->fim->format('d/m/Y')}}</p>
                </div>
                <div class="flex place-items-center">
                    <a class="mr-2 w-6" href="{{route('contratos.edit', $contrato)}}" title="Editar contrato">
                        <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                    </a>
                    <livewire:deletar-contrato :contrato="$contrato" :tipo="'icon'">
                </div>
            </div>
            <hr class="mb-2">
        @endforeach
    </x-slot>
    <x-slot name="side_content">
        <a href="{{route('produtores.contratos.create', $produtor)}}" class="organosoft-btn flex justify-center">
            <img src="{{asset('img/plus-white.svg')}}" alt="icon plus" class="mr-1 w-6">
            Adicionar contrato
        </a>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
    </x-slot>
</x-auth>
