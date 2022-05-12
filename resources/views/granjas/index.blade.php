<x-auth>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        @foreach ($granjas as $granja)
            <div class="flex flex-wrap w-full mb-4">
                <div class="w-5/6 flex flex-wrap">
                    <a href="{{route('granjas.show', $granja)}}" class="flex w-full text-primary text-3xl font-bold">{{$granja->nome}}</a>
                    <p class="text-sm text-gray-500">Cliente desde {{$granja->created_at->year}}</p>
                </div>
                <div class="flex place-items-center">
                    <a class="mr-2 w-6" href="{{route('granjas.edit', $granja)}}" title="Editar Granja">
                        <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                    </a>
                   <livewire:deletar-granja :granja="$granja" :tipo="'icon'">
                </div>
            </div>
            <hr class="mb-2">
        @endforeach
    </x-slot>
    <x-slot name="side_content">
        <a href="{{route('produtores.granjas.create', $produtor)}}" class="organosoft-btn flex justify-center">
            <img src="{{asset('img/plus-white.svg')}}" alt="icon plus" class="mr-1 w-6">
            Adicionar uma granja
        </a>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
    </x-slot>
</x-auth>
