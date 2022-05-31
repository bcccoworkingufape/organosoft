<div>
    <button wire:click.prevent="toggleModal" class="organosoft-reports-grid__item">
        <span class="icon">
          <img src="{{asset('img/car-outline.svg')}}" alt="link relatório de veículos">
        </span>
        <span class="title">
          Produtores
        </span>
    </button>

    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">Relatório de Produtores</x-slot>
        <x-slot name="content">
            <x-form wire:submit.prevent="exportar">
                
                <x-form-control class="w-full">
                    <x-label for="estadoProdutor_id" value="Estado do Produtor:" />
                    <x-select id="estado" name="estado" value="{{old('estado')}}" required onchange="buscaCidades(this.value)">
                        <option value="" disabled selected>--Selecione o estado--</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </x-select>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="cidade" value="Cidade:" />
                    <x-select id="cidade" value="{{old('cidade')}}" required wire:model="cidade"></x-select>
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
