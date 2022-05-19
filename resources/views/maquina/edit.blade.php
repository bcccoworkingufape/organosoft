<x-auth>
    <x-slot name="title">
        Atualizar Máquina
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('maquinas.update', $maquina)}}" method="POST" class="justify-center flex">
            @csrf
            @method('PUT')
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <input id="fabrica_id" type="hidden" name="fabrica_id" value="{{$fabrica->id}}"/>
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-form-control class="w-full">
                    <x-label for="marca" value="Marca:" />
                    <x-input id="marca" type="text" name="marca" value="{{old('marca', $maquina)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="modelo" value="Modelo:" />
                    <x-input id="modelo" type="text" name="modelo" value="{{old('modelo', $maquina)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="chassi" value="Chassi:" />
                    <x-input id="chassi" type="text" name="chassi" value="{{old('chassi', $maquina)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="placa" value="Placa:" />
                    <x-input id="placa" type="text" name="placa" value="{{old('placa', $maquina)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="ano" value="Ano:" />
                    <x-input id="ano" type="text" name="ano" value="{{old('ano', $maquina)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="equipamento_id" value="Equipamento:"></x-label>
                    <x-select name="equipamento_id" id="equipamentos_id">
                        <option value="" disabled>Selecione uma opção</option>
                        @foreach($equipamentos as $equipamento)
                            <option value="{{ $equipamento->id }}" {{ $equipamento->id == $maquina->equipamento_id ? 'selected' : '' }}>
                                {{ $equipamento->nome }}
                            </option>
                        @endforeach
                    </x-select>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Atualizar
            </x-button>
        </div>
    </x-slot>

</x-auth>
