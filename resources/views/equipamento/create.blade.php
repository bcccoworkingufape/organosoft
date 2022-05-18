<x-auth>
    <x-slot name="title">
        Cadastrar Equipamento
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('equipamentos.store')}}" method="POST" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-form-control class="w-full">
                    <x-label for="nome" value="Nome:" />
                    <x-input id="nome" type="text" name="nome" value="{{old('nome')}}"/>
                </x-form-control>

                <x-form-control class="w-full">
                    <x-label for="data_compra" value="Data de Compra:" />
                    <x-input id="data_compra" type="date" name="data_compra" value="{{old('data_compra')}}"/>
                </x-form-control>

                <x-form-control class="w-full">
                    <x-label for="fabricas_id" value="Fabrica:"></x-label>
                    <x-select name="fabricas_id" id="fabricas_id">
                        <option value="" disabled {{ !old('fabricas_id') ? 'selected' : '' }}>Selecione uma opção</option>
                        @foreach($fabricas as $fabrica)
                            <option value="{{ $fabrica->id }}" {{ old('fabricas_id') && old('fabricas_id') == $fabrica->id ? 'selected' : '' }}>
                                {{ $fabrica->descricao }}
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
