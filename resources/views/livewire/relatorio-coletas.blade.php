<div>
    <button wire:click.prevent="toggleModal" class="organosoft-reports-grid__item">
        <span class="icon">
          <img src="{{asset('img/collect-outline.svg')}}" alt="link relatório de coletas">
        </span>
        <span class="title">
          Coletas
        </span>
    </button>
    <!--Como fábrica, desejo emitir um relatório de coletas que filtre por
    produtor -> FEITO,
    granja -> FEITO,
    período,
    valor,
    status,
    estado e
    município,
    para visualizar as informações-->
    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">Relatório de Coletas</x-slot>
        <x-slot name="content">
            <x-form wire:submit.prevent="exportar">
                <x-form-control class="w-full">
                    <x-label for="produtor_id" value="Produtor:" />
                    <x-select id="produtor" name="produtor" value="{{old('produtor')}}" required   wire:model="produtor">
                        <option value="">--Todos Produtores--</option>
                            @foreach($produtores as $produtor)
                                <option value="{{ $produtor->id }}" >
                                    {{ $produtor->nome }}
                                </option>
                            @endforeach

                    </x-select>
                </x-form-control>

                <x-form-control class="w-full">
                    <x-label for="granja_id" value="Granja:" />
                    <x-select id="granja" name="granja" value="{{old('granja')}}" required   wire:model="granja">
                        <option value="">--Todas Granjas--</option>
                            @foreach($granjas as $granja)
                                <option value="{{ $granja->id }}" >
                                {{($granja->nome) }}
                                </option>
                            @endforeach

                    </x-select>
                </x-form-control>

                <x-form-control class="w-full">
                    <x-label for="statusa_id" value="Status:" />
                    <x-select id="status" name="status" value="{{old('status')}}" required   wire:model="coleta_status">
                        <option value="">--Todos Status--</option>
                            @foreach($status as $stat)
                                <option value="{{ $stat->status }}" >
                                {{($stat->status) }}
                                </option>
                            @endforeach

                    </x-select>
                </x-form-control>

            </x-form>
        </x-slot>
        <x-slot name="footer">
            <x-button class="bg-red-600 hover:bg-red-700" wire:click.prevent="toggleModal" wire:loading.attr="disabled">
                Cancelar
            </x-button>
            <x-button type="submit" class="ml-2" wire:click.prevent="exportar" wire:loading.attr="disabled">
                Gerar Relatório
            </x-button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('modals')
        <script src="{{asset('js/estado-cidade.js')}}"></script>
        <script>
           $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
           var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

            $('#telefone').mask(SPMaskBehavior, spOptions);
        </script>
    @endpush
</div>
