<x-auth>
    <x-slot name="title">
        Cadastrar Contrato
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('produtores.contratos.store', $produtor)}}" method="POST" enctype="multipart/form-data" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap" x-data="{status: '{{old('status')}}'}">
                <div class="w-full">
                    <x-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <livewire:select-multiple-granjas :produtor="$produtor" :old="old('granjas')" />
                <x-form-control class="w-full">
                    <x-label for="valor" value="Valor:" />
                    <x-input id="valor" type="text" name="valor" value="{{old('valor')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="frequencia_coleta" value="Frequência da coleta:" />
                    <x-input id="frequencia_coleta" type="text" name="frequencia_coleta" value="{{old('frequencia_coleta')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-1">
                    <x-label for="inicio" value="Data de início:" />
                    <x-datepicker id="inicio" type="date" name="inicio" value="{{old('inicio')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-1">
                    <x-label for="fim" value="Data final:" />
                    <x-datepicker id="fim" type="date" name="fim" value="{{old('fim')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="arquivo" value="Arquivo:" />
                    <x-input id="arquivo" type="file" name="arquivo"/>
                </x-form-control>
                <x-form-control x-bind:class="status == 'outro' ? 'w-1/2 pr-1' : 'w-full'">
                    <x-label for="status" value="Status:" />
                    <x-select id="status" x-model="status" name="status" required>
                        <option value="" disabled selected>--Selecione o status--</option>
                        <option @selected(old('status')) value="Em construção">Em construção</option>
                        <option @selected(old('status')) value="Em execução">Em execução</option>
                        <option @selected(old('status')) value="Cancelado">Cancelado</option>
                        <option @selected(old('status')) value="Encerrado">Encerrado</option>
                        <option @selected(old('status')) value="outro">Outro</option>
                    </x-select>
                </x-form-control>
                <x-form-control x-show="status == 'outro'" class="w-1/2 pl-1">
                    <x-label for="outro" value="Informe o status:" />
                    <x-input id="outro" type="text" name="outro" value="{{old('outro')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="observacao" value="Observações:" />
                    <textarea id="observacao" type="text" name="observacao">{{old('observacao')}}</textarea>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-around mt-4">
            <a href="{{route('produtores.show', $produtor)}}" class="bg-red-600 hover:bg-red-700 organosoft-btn">
                Cancelar
            </a>
            <x-button form="form">
                Cadastrar
            </x-button>
        </div>
    </x-slot>
    @push('modals')
        <script>
            $('#valor').mask('#.##0,00', {
                reverse: true
            });
        </script>
    @endpush
</x-auth>
