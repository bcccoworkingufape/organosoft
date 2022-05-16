<x-auth>
    <x-slot name="title">
        Cadastrar Veículo
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('veiculos.store')}}" method="POST" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-form-control class="w-full">
                    <x-label for="marca" value="Marca:" />
                    <x-input id="marca" type="text" name="marca" value="{{old('marca')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="modelo" value="Modelo:" />
                    <x-input id="modelo" type="text" name="modelo" value="{{old('modelo')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="chassi" value="Chassi:" />
                    <x-input id="chassi" type="text" name="chassi" value="{{old('chassi')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="placa" value="Placa:" />
                    <x-input id="placa" type="text" name="placa" value="{{old('placa')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="ano" value="Ano:" />
                    <x-input id="ano" type="text" name="ano" value="{{old('ano')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="categoriaVeiculo_id" value="Categoria do Veículo:"></x-label>
                    <x-select name="categorias_veiculos_id" id="categorias_veiculos_id">
                        <option value="" disabled {{ !old('categorias_veiculos_id') ? 'selected' : '' }}>Selecione uma opção</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categorias_veiculos_id') && old('categorias_veiculos_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->descricao }}
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
