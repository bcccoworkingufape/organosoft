<x-auth>
    <x-slot name="no_bg_main">
        <div class="flex flex-wrap w-full">
            <x-card class="flex flex-wrap w-full">
                <div class="mt-2 md:mt-0 w-full md:w-2/3 flex justify-center">
                    <div class="w-fit">
                        <h1 class="text-primary text-3xl font-bold">Informações do contrato</h1>
                        <div class="flex mt-3">
                            <img src="{{asset('img/calendar-primary.svg')}}" alt="calendar icon" class="w-6 mr-2">
                            <p class="text-gray-500 font-medium">Contrato válido de {{($contrato->inicio->format('d/m/Y'))}} a {{$contrato->fim->format('d/m/Y')}}</p>
                        </div>
                        <div class="flex mt-3">
                            <div class="w-6 mr-2"></div>
                            <p class="text-gray-500 font-medium">Valor: R${{number_format($contrato->valor, 2, ',', '.')}}</p>
                        </div>
                        <div class="flex mt-3">
                            <div class="w-6 mr-2"></div>
                            <p class="text-gray-500 font-medium">Status: {{$contrato->status}}</p>
                        </div>
                        <div class="flex mt-3">
                            <div class="w-6 mr-2"></div>
                            <p class="text-gray-500 font-medium">Frequência da coleta{{$contrato->frequencia_coleta}}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 w-full md:w-1/3 md:h-full flex items-center justify-center">
                    <a href="{{route('contratos.documento', $contrato)}}"  class="h-full w-fit mt-2 flex flex-wrap items-center justify-center border-primary border rounded-3xl">
                        <div class="mt-1 flex items-center justify-center w-full">
                            <img src="{{asset('img/doc-primary.svg')}}" alt="doc icon" class="h-4/5">
                        </div>
                        <h1 class="text-primary font-bold text-lg text-center break-normal mx-2">Visualizar<br>documento</h1>
                    </a>
                </div>
            </x-card>
        </div>
        <div class="flex justify-around mt-2">
            <a href="{{route('contratos.edit', $contrato)}}" class="organosoft-btn flex justify-center">
                <img src="{{asset('img/pencil-white.svg')}}" alt="icon pencil" class="mr-1 w-6">
                Editar contrato
            </a>
            <livewire:deletar-contrato :contrato="$contrato" :cor="'white'">
        </div>
        <div class="flex flex-wrap mt-2 w-full">
            <div class="w-full">
                <x-card class="flex flex-wrap justify-center">
                    <h2 class="text-primary font-bold text-3xl mb-4">Granjas no contrato</h2>
                    <x-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($contrato->granjas as $granja)
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-5/6 flex flex-wrap">
                                <div class="w-full">
                                    <a href="{{route('granjas.show', $granja)}}" class="flex w-fit text-primary text-2xl font-bold">{{$granja->nome}}</a>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-2 w-full">
                    @endforeach
                </x-card>
            </div>
        </div>
    </x-slot>
</x-auth>
