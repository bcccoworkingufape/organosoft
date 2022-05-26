<x-auth>

    <x-slot name="title">
        Registrar qualidade de coleta
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('qualidade.create')}}" method="POST" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <input type="hidden" name="coleta_id" value="{{$coleta_id}}" /> <br>
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
                    <x-input id="avaliacaoQualidade" type="text" name="avaliacaoQualidade" value="" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="descricao" value="Descrição:" />
                    <x-input id="descricao" type="text" name="descricao" value="" required/>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Salvar
            </x-button>
        </div>
    </x-slot>
    <script src="{{asset('js/estado-cidade.js')}}"></script>
</x-auth>
