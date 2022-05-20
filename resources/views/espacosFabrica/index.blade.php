<x-auth>
    <x-slot name="title">
        Espaços da Fábrica
    </x-slot>
    <x-slot name="bg_main">
        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="organosoft-list">
            @if(count($espacosFabricas) > 0)
              @foreach ($espacosFabricas as $espacoFabrica)
                  <div class="organosoft-list__item">
                      <div class="organosoft-list__item__title">
                          <a href="{{ route('espacosFabrica.show', $espacoFabrica) }}">{{$espacoFabrica->nome}}</a>
                          <p>{{ $espacoFabrica->tipoItemEspacoFabrica()->first()->nome }}</p>
                          <p>{{ $espacoFabrica->observacoes }}</p>
                          <p>{{ $espacoFabrica->largura }} X {{ $espacoFabrica->altura }} X {{ $espacoFabrica->comprimento }}</p>
                      </div>
                      <div class="flex place-items-center">
                          <a class="mr-2 w-6" href="{{route('espacosFabrica.edit', $espacoFabrica)}}" title="Editar espaço da fabrica">
                              <img src="{{asset('img/pencil-primary.svg')}}" alt="link editar">
                          </a>
                          <livewire:deletar-espacos-fabrica :espacosFabrica="$espacoFabrica" :tipo="'icon'">
                      </div>
                  </div>
                  <hr class="mb-2">
              @endforeach
              @else
              <div class="organosoft-list__item  justify-center">
                <div class="organosoft-list__item__title">
                  <p>Nenhum espaço de fábrica cadastrado</p>
                </div>
              </div>
              @endif
        </div>
    </x-slot>
    <x-slot name="side_content">
        <a href="{{route('espacosFabrica.create')}}" class="organosoft-btn flex justify-center">
            <img src="{{asset('img/plus-white.svg')}}" alt="icon plus" class="mr-1 w-6">
            Adicionar espaço da fabrica
        </a>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
        <x-card class="h-32"></x-card>
    </x-slot>
</x-auth>