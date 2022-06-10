<x-auth>

    <x-slot name="title">
        Editar Avaliação
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('qualidade.store', $qualidade->id)}}" method="POST" class="justify-center flex">
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
                    <x-label for="avaliacaoQualidade" value="Avaliação:" />
                    <x-select id="avaliacaoQualidade" name="avaliacaoQualidade" value="{{$qualidade->avaliacaoQualidade}}" required>
                        <option value="{{$qualidade->avaliacaoQualidade}}" disabled selected>{{$qualidade->avaliacaoQualidade}}</option>
                        <option value="Ótimo">Ótimo</option>
                        <option value="Bom">Bom</option>
                        <option value="Regular">Regular</option>
                        <option value="Ruim">Ruim</option>
                        <option value="Péssimo">Péssimo</option>
                    </x-select>
                </x-form-control>
                {{-- <x-form-control class="w-1/2 pl-4">
                    <x-label for="avaliacaoQualidade" value="Avaliação:" />
                    <x-input id="avaliacaoQualidade" type="text" name="avaliacaoQualidade" value="{{$qualidade->avaliacaoQualidade}}"/>
                </x-form-control> --}}
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="descricao" value="Descrição:" />
                    <x-input id="descricao" type="text" name="descricao" value="{{$qualidade->descricao}}"/>
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
