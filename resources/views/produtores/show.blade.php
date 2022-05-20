<x-auth>
    <x-slot name="no_bg_main">
        <div class="flex flex-wrap w-full">
            <x-card class="flex flex-wrap w-full">
                <div class="mt-2 md:mt-0 w-full md:w-1/4 flex items-center justify-center">
                    <img src="{{ asset('img/logo-default.png') }}" alt="logo img" class="w-40 md:w-3/4">
                </div>
                <div class="mt-2 md:mt-0 w-full md:w-1/2 flex justify-center">
                    <div class="w-fit">
                        <h1 class="text-primary text-3xl font-bold">{{$produtor->nome}}</h1>
                        <p class="text-sm text-gray-500">Cliente desde {{$produtor->created_at->year}}</p>
                        <div class="flex mt-3">
                            <img src="{{asset('img/location-primary.svg')}}" alt="mail icon" class="w-4 mr-4">
                            <div>
                                <p class="text-gray-500 font-medium">{{$produtor->endereco->rua}}, {{$produtor->endereco->numero}}</p>
                                <p class="text-gray-500 font-medium">{{$produtor->endereco->bairro}}, {{$produtor->endereco->cidade}}/{{$produtor->endereco->estado}}</p>
                                <p class="text-gray-500 font-medium">CEP: {{$produtor->endereco->cep}}</p>
                                @if ($produtor->endereco->complemento)
                                    <p class="text-gray-500 font-medium">Complemento: {{$produtor->endereco->complemento}}</p>
                                @endif
                                @if ($produtor->endereco->ponto_referencia)
                                    <p class="text-gray-500 font-medium">Ponto de referência: {{$produtor->endereco->ponto_referencia}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex mt-3">
                            <img src="{{asset('img/paper-primary.svg')}}" alt="paper icon" class="w-4 mr-4">
                            <p class="text-gray-500 font-medium">{{$produtor->cnpj}}</p>
                        </div>
                        <div class="flex mt-3">
                            <img src="{{asset('img/phone-primary.svg')}}" alt="phone icon" class="w-4 mr-4">
                            <p class="text-gray-500 font-medium">{{$produtor->telefone}}</p>
                        </div>
                        <div class="flex mt-3">
                            <img src="{{asset('img/mail-primary.svg')}}" alt="mail icon" class="w-4 mr-4">
                            <a href="mailto:{{$produtor->email}}" class="text-gray-500 font-medium">{{$produtor->email}}</a>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 w-full md:w-1/4 md:h-full flex items-center justify-center">
                    <a href="{{route('produtores.contratos.create', $produtor)}}"  class="h-full md:h-4/6 w-fit mt-2 flex flex-wrap items-center justify-center border-primary border rounded-3xl">
                        <div class="mt-1 flex items-center justify-center w-full">
                            <img src="{{asset('img/doc-primary.svg')}}" alt="doc icon" class="h-4/5">
                        </div>
                        <h1 class="text-primary font-bold text-lg text-center break-normal mx-2">Visualizar<br>contratos</h1>
                    </a>
                </div>
            </x-card>
        </div>
        <div class="flex justify-around mt-2">
            <a href="{{route('produtores.granjas.create', $produtor)}}" class="organosoft-btn flex justify-center">
                <img src="{{asset('img/plus-white.svg')}}" alt="icon plus" class="mr-1 w-6">
                Adicionar uma granja
            </a>
            <a href="{{route('produtores.edit', $produtor)}}" class="organosoft-btn flex justify-center">
                <img src="{{asset('img/pencil-white.svg')}}" alt="icon pencil" class="mr-1 w-6">
                Editar produtor
            </a>
            <livewire:deletar-produtor :produtor="$produtor" :cor="'white'">
        </div>
        @if ($granjas)
            <div class="flex flex-wrap mt-2">
                <x-card class="flex flex-wrap justify-center">
                    <h2 class="text-primary font-bold text-3xl mb-4">Granjas do produtor</h2>
                    <x-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($granjas as $granja)
                        <div class="flex flex-wrap w-full mb-4">
                            <div class="w-5/6 flex flex-wrap">
                                <div class="w-full">
                                    <a href="{{route('granjas.show', $granja)}}" class="flex w-fit text-primary text-2xl font-bold">{{$granja->nome}}</a>
                                </div>
                                <p class="text-sm text-gray-500">Cliente desde {{$granja->created_at->year}}</p>
                            </div>
                            <div class="flex place-items-center">
                                <a class="mr-2 w-6" href="{{route('granjas.edit', $granja)}}" title="Editar Granja">
                                    <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                                </a>
                            <livewire:deletar-granja :granja="$granja" :tipo="'icon'">
                            </div>
                        </div>
                        <hr class="mb-2 w-full">
                    @endforeach
                </x-card>
            </div>
        @endif
    </x-slot>
</x-auth>
