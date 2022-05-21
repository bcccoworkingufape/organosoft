<x-auth>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        @foreach ($coletas as $coleta)
            <div class="flex flex-wrap w-full mb-4">
                <div class="w-5/6 flex flex-wrap">
                    <a href="{{route('coleta.view', $coleta->id)}}" class="flex w-full text-primary text-3xl font-bold">Agendado para {{$coleta->data}}</a>
                    
                </div>
                <div class="flex place-items-center">
                    <a class="mr-2 w-6" href="{{route('coleta.edit', $coleta->id)}}" title="Editar coleta">
                        <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                    </a>
                    
                </div>
            </div>
            <hr class="mb-2">
        @endforeach
        
    </x-slot>

</x-auth>
