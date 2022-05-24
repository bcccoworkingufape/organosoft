<x-auth>
    <x-slot name="title">
        Cadastrar Espaços de Fábrica
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('espacosFabrica.store')}}" method="POST" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <x-validation-errors class="mb-4" />
                @if(session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-form-control class="w-full">
                    <x-label for="nome" value="Nome:" />
                    <x-input id="nome" type="text" name="nome" value="{{old('nome')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="observacoes" value="Observações:" />
                    <textarea id="observacoes" name="observacoes">{{old('observacoes')}}</textarea>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="largura" value="Largura:" />
                    <x-input id="largura" name="largura" type="number" step="0.01" value="{{old('largura')}}"></x-input>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="altura" value="Altura:" />
                    <x-input id="altura" name="altura" type="number" step="0.01" value="{{old('altura')}}"></x-input>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="comprimento" value="Comprimento:" />
                    <x-input id="comprimento" name="comprimento" type="number" step="0.01" value="{{old('comprimento')}}"></x-input>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="tipo_item_espaco_fabrica_id" value="Tipo item espaço fábrica: "></x-label>
                    <x-select name="tipo_item_espaco_fabrica_id" id="tipo_item_espaco_fabrica_id">
                        <option value="" disabled {{ !old('tipo_item_espaco_fabrica_id') ? 'selected' : '' }}>Selecione uma opção</option>
                        @foreach($tipoItemEspacoFabricas as $tipoItemEspacoFabrica)
                            <option value="{{ $tipoItemEspacoFabrica->id }}" {{ old('tipo_item_espaco_fabrica_id') && old('tipo_item_espaco_fabrica_id') == $tipoItemEspacoFabrica->id ? 'selected' : '' }}>
                                {{ $tipoItemEspacoFabrica->nome }}
                            </option>
                        @endforeach
                    </x-select>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Cadastrar
            </x-button>
        </div>
    </x-slot>
</x-auth>
