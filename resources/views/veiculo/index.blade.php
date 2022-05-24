<x-auth>
    <x-slot name="title">
        Veículos
    </x-slot>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="organosoft-list">
            @if(count($veiculos) > 0)
                @foreach ($veiculos as $veiculo)
                    <div class="organosoft-list__item">
                        <div class="organosoft-list__item__icon">
                            <img src="{{asset('img/car.svg')}}" alt="link editar">
                        </div>
                        <div class="w-5/6 flex flex-wrap">
                            <a href="{{route('veiculos.show', $veiculo)}}" class="flex w-full text-primary text-3xl font-bold">{{$veiculo->marca}}</a>
                            <p class="text-sm text-gray-500">{{$veiculo->placa}}</p>
                        </div>
                        <div class="flex place-items-center">
                            <a class="mr-2 w-6" href="{{route('veiculos.edit', $veiculo)}}" title="Editar veículo">
                                <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                            </a>
                            <livewire:deletar-veiculo :veiculo="$veiculo" :tipo="'icon'">
                        </div>
                    </div>
                    <hr class="mb-2">
                @endforeach
            @else
              <div class="organosoft-list__item  justify-center">
                <div class="organosoft-list__item__title">
                  <p>Nenhum veículo cadastrado</p>
                </div>
              </div>
            @endif
        </div>
    </x-slot>
    <x-slot name="side_content">
        <x-link href="{{route('veiculos.create')}}">
            <img src="{{asset('img/plus-white.svg')}}" alt="icon plus">
            Adicionar veículos
        </x-link>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
    </x-slot>
</x-auth>
