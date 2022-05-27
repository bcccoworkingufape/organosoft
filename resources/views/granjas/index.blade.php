<x-auth>
    <x-slot name="title">
        Granjas
    </x-slot>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        @forelse ($granjas as $granja)
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
        @empty
            <div class="organosoft-list__item  justify-center flex flex-wrap w-full">
                <div class="organosoft-list__item__title">
                    <p>Nenhuma granja cadastrada</p>
                </div>
            </div>
        @endforelse
    </x-slot>
    <x-slot name="side_content">
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
    </x-slot>
</x-auth>
