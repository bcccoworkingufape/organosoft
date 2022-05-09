<x-auth>
    <x-slot name="no_bg_main">
        <div class="flex flex-wrap gap-2">
            <x-card class="w-full flex">
                <div class="w-1/4">LOGO</div>
                <div class="w-2/3">
                    <h1 class="text-primary text-3xl font-bold">{{$produtor->nome}}</h1>
                    <p class="text-sm text-gray-500">Cliente desde {{$produtor->created_at->year}}</p>
                    <div class="flex mt-3">
                        <img src="{{asset('img/paper-primary.svg')}}" alt="paper icon" class="w-4 mr-2">
                        <p class="text-gray-500 font-medium">{{$produtor->cnpj}}</p>
                    </div>
                    <div class="flex mt-3">
                        <img src="{{asset('img/phone-primary.svg')}}" alt="pone icon" class="w-4 mr-2">
                        <p class="text-gray-500 font-medium">{{$produtor->telefone}}</p>
                    </div>
                    <div class="flex mt-3">
                        <img src="{{asset('img/mail-primary.svg')}}" alt="mail icon" class="w-4 mr-2">
                        <a href="mailto:{{$produtor->email}}" class="text-gray-500 font-medium">{{$produtor->email}}</a>
                    </div>
                </div>
                <div class="w-1/4">CONTRATOS</div>
            </x-card>
            <x-card class="h-40 w-full grid place-content-center">
                Controle de qualidade?
            </x-card>
        </div>
        <div class="flex justify-between mt-2">
            <a href="#" class="organosoft-btn justify-center">
                Agendar coleta
            </a>
            <a href="{{route('produtores.edit', $produtor)}}" class="organosoft-btn flex justify-center">
                <img src="{{asset('img/pencil-white.svg')}}" alt="icon pencil" class="mr-1 w-6">
                Editar produtor
            </a>
            <livewire:deletar-produtor :produtor="$produtor" :cor="'white'">
        </div>
    </x-slot>
</x-auth>
