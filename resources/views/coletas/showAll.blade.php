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
                <div class="w-2/3 flex flex-wrap">
                    <a href="{{route('coleta.view', $coleta->id)}}" class="flex w-full text-primary text-3xl font-bold">Agendado: {{$coleta->data}} | Granja: 
                        @foreach($granjas as $granja)
                            @if($granja->id == $coleta->id_granja)
                                {{$granja->nome}}
                            @endif
                        @endforeach
                    </a>
                    
                </div>
                <div class="flex place-items-center">
                    @if($qualidades[$coleta->id] > 0)
                        <a href="{{route('qualidade.view', $qualidades[$coleta->id])}}" class="mr-2 w-60 organosoft-btn justify-center">
                            Ver avalicação
                        </a>
                    @elseif($qualidades[$coleta->id] == 0 && $coleta->status == "entregue")
                        <a href="{{route('qualidade.p.create', $coleta->id)}}" class="mr-2 w-60 organosoft-btn justify-center">
                            Avalicação de qualidade
                        </a>
                    @endif
                </div>
                <div class="flex place-items-center">
                    <a class="mr-2 w-6" href="{{route('coleta.edit', $coleta->id)}}" title="Editar coleta">
                        <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                    </a>
                    <livewire:deletar-coleta :coleta="$coleta" :cor="'white'">
                </div>
            </div>
            <hr class="mb-2">
        @endforeach
        
    </x-slot>

</x-auth>
