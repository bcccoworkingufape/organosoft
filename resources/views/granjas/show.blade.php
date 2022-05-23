<x-auth>
    <x-slot name="no_bg_main">
        <div class="flex flex-wrap gap-2">
            <x-card class="w-full flex">
                <div class="w-2/3">
                    <h1 class="text-primary text-3xl font-bold">{{$granja->nome}}</h1>
                    <p class="text-sm text-gray-500">Quantidade de aves {{$granja->quant_aves}}</p>
                    <p class="text-sm text-gray-500">Cliente desde {{$granja->created_at->year}}</p>
                </div>
                <div class="w-1/4">CONTRATO</div>
            </x-card>
            <x-card class=" w-full grid">
                <h1 class="mt-3 mb-3 text-primary text-2xl font-bold w-full">Endereço</h1>
                <div class="flex w-full">
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium ml-4">CEP: {{$granja->endereco->cep}}</p>
                    </div>
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium">Bairro: {{$granja->endereco->bairro}}</p>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium ml-4">Rua: {{$granja->endereco->rua}}</p>
                    </div>
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium">Número: {{$granja->endereco->numero}}</p>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium ml-4">Estado: {{$granja->endereco->estado}}</p>
                    </div>
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium">Cidade: {{$granja->endereco->cidade}}</p>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium ml-4">Complemento: {{$granja->endereco->complemento}}</p>
                    </div>
                    <div class="w-1/2">
                        <p class="text-gray-500 font-medium">Ponto de Referência: {{$granja->endereco->ponto_referencia}}</p>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="flex justify-between mt-2">
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
