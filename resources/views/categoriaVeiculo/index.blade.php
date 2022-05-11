<x-auth>
    <x-slot name="title">
        Categoria de Veículos
    </x-slot>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        @foreach ($categoriaVeiculos as $categoriaVeiculo)
            <div class="flex flex-wrap w-full mb-4">
                <div class="w-5/6 flex flex-wrap">
                    <a href="{{route('categoriaVeiculos.show', $categoriaVeiculo)}}" class="flex w-full text-primary text-3xl font-bold">{{$categoriaVeiculo->descricao}}</a>
                    <p class="text-sm text-gray-500">Cliente desde {{$categoriaVeiculo->created_at->year}}</p>
                </div>
                <div class="flex place-items-center">
                    <a class="mr-2 w-6" href="{{route('categoriaVeiculos.edit', $categoriaVeiculo)}}" title="Editar categoria de veículos">
                        <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                    </a>
                    <livewire:deletar-categoria-veiculo :categoriaVeiculo="$categoriaVeiculo" :tipo="'icon'">
                </div>
            </div>
            <hr class="mb-2">
        @endforeach
    </x-slot>
    <x-slot name="side_content">
        <a href="{{route('categoriaVeiculos.create')}}" class="organosoft-btn flex justify-center">
            <img src="{{asset('img/plus-white.svg')}}" alt="icon plus" class="mr-1 w-6">
            Adicionar categoria de veículos
        </a>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
    </x-slot>
</x-auth>