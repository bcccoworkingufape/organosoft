<x-auth>

    <x-slot name="title">
        Detalhes do Agendamento da Coleta
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('coleta.edit', $coleta->id)}}" method="GET" class="justify-center flex">
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
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="data" value="Data da coleta:" />
                    <x-input readonly  id="data" type="date" name="data" value="{{$coleta->data}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="hora" value="Hora da Coleta:" />
                    <x-input readonly id="hora" type="time" name="hora" value="{{$coleta->hora}}" required/>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Editar
            </x-button>
        </div>

        <form id="atualizar_status" action="{{route('coleta.atualizar.status', $coleta->id)}}" method="GET" class="justify-center flex">
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
                @if($coleta->status == "preparacao")
                    <x-form-control class="w-1/2 pl-4">
                        <x-label for="data" value="Status atual:" />
                        <x-input readonly  id="data" type="text" name="data" value="Preparação"/>
                    </x-form-control>
                    <x-form-control class="w-1/2 pl-4">
                        <x-label for="data" value="Atualizar status para:" />
                        <x-input readonly  id="data" type="text" name="data" value="Despacho"/>
                    </x-form-control>
                @elseif($coleta->status == "despacho")
                    <x-form-control class="w-1/2 pl-4">
                        <x-label for="data" value="Status atual:" />
                        <x-input readonly  id="data" type="text" name="data" value="Despacho"/>
                    </x-form-control>
                    <x-form-control class="w-1/2 pl-4">
                        <x-label for="data" value="Atualizar status para:" />
                        <x-input readonly  id="data" type="text" name="data" value="Em rota"/>
                    </x-form-control>
                @elseif($coleta->status == "em_rota")
                    <x-form-control class="w-1/2 pl-4">
                        <x-label for="data" value="Status atual:" />
                        <x-input readonly  id="data" type="text" name="data" value="Em rota"/>
                    </x-form-control>
                    <x-form-control class="w-1/2 pl-4">
                        <x-label for="data" value="Atualizar status para:" />
                        <x-input readonly  id="data" type="text" name="data" value="Entregue"/>
                    </x-form-control>
                @endif
                @if($coleta->status == "entregue")
                    <x-form-control class="w-full pl-4">
                        <x-label for="status" value="Status" />
                        <x-input readonly  id="status" type="text" name="status" value="Entregue"/>
                    </x-form-control>
                @endif
            </x-form>
        </form>
        @if($coleta->status != "entregue")
        <div class="flex justify-center">
            <x-button class="mt-4" form="atualizar_status">
                Atualizar status
            </x-button>
        </div>
        @endif
    </x-slot>
    <script src="{{asset('js/estado-cidade.js')}}"></script>
</x-auth>
