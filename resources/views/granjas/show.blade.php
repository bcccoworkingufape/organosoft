<x-auth>
    <x-slot name="no_bg_main">
        <div class="flex flex-wrap w-full">
            <x-card class="flex flex-wrap w-full">
                <div class="mt-2 md:mt-0 w-full md:w-1/4 flex items-center justify-center">
                    <img src="/img/perfilGranja/{{$granja->imagem}}" alt="logo img" class="w-40 md:w-3/4">
                </div>
                <div class="mt-2 md:mt-0 w-full md:w-1/2 flex justify-center">
                    <div class="w-fit">
                        <h1 class="text-primary text-3xl font-bold">{{$granja->nome}}</h1>
                        <p class="text-sm text-gray-500">Cliente desde {{$granja->created_at->year}}</p>
                        <div class="flex mt-3">
                            <img src="{{asset('img/location-primary.svg')}}" alt="mail icon" class="w-4 mr-4">
                            <div>
                                <p class="text-gray-500 font-medium">{{$granja->endereco->rua}}, {{$granja->endereco->numero}}</p>
                                <p class="text-gray-500 font-medium">{{$granja->endereco->bairro}}, {{$granja->endereco->cidade}}/{{$granja->endereco->estado}}</p>
                                <p class="text-gray-500 font-medium">CEP: {{$granja->endereco->cep}}</p>
                                @if ($granja->endereco->complemento)
                                    <p class="text-gray-500 font-medium">Complemento: {{$granja->endereco->complemento}}</p>
                                @endif
                                @if ($granja->endereco->ponto_referencia)
                                    <p class="text-gray-500 font-medium">Ponto de referência: {{$granja->endereco->ponto_referencia}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex mt-3">
                            <div class="w-6 mr-2"></div>
                            <p class="text-gray-500 font-medium">Quantidade de aves: {{$granja->quant_aves}}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 w-full md:w-1/4 flex items-center justify-center">
                    <a href="{{route('granjas.contratos.index', $granja)}}"  class="h-full w-fit mt-2 flex flex-wrap items-center justify-center border-primary border rounded-3xl">
                        <div class="mt-1 flex items-center justify-center w-full">
                            <img src="{{asset('img/doc-primary.svg')}}" alt="doc icon" class="h-4/5">
                        </div>
                        <h1 class="text-primary font-bold text-lg text-center break-normal mx-2">Visualizar<br>contratos</h1>
                    </a>
                </div>
            </x-card>
        </div>
        <div class="flex justify-around mt-2">
            <a href="{{route('coleta.p.create', $granja)}}" class="organosoft-btn justify-center">
                Nova Coleta
            </a>
            <a href="{{route('coleta.show', $granja)}}" class="organosoft-btn justify-center">
                Ver Coletas
            </a>
            <a href="{{route('granjas.edit', $granja)}}" class="organosoft-btn flex justify-center">
                <img src="{{asset('img/pencil-white.svg')}}" alt="icon pencil" class="mr-1 w-6">
                Editar granja
            </a>
            <livewire:deletar-granja :granja="$granja" :cor="'white'">
        </div>
    </x-slot>
</x-auth>



