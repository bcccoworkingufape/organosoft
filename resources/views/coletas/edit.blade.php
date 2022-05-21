<x-auth>

    <x-slot name="title">
        Editar Coleta
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('coleta.store', $coleta->id)}}" method="POST" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <div class="w-full">
                    <x-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <x-form-control class="w-1/2 pl-4" >
                    <x-label for="data" value="Data da coleta:" />
                    <x-input id="data" type="date" name="data" value="{{$coleta->data}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="hora" value="Hora da Coleta:" />
                    <x-input id="hora" type="time" name="hora" value="{{$coleta->hora}}" required/>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Atualizar
            </x-button>
        </div>
    </x-slot>
    <script src="{{asset('js/estado-cidade.js')}}"></script>
</x-auth>
