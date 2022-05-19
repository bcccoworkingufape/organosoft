<x-auth>
    <x-slot name="title">
        Atualizar Produtor
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('produtores.update', $produtor)}}" method="POST" class="justify-center flex">
            @csrf
            @method('PUT')
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <div class="w-full">
                    <x-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <x-form-control class="w-full">
                    <x-label for="nome" value="Nome:" />
                    <x-input id="nome" type="text" name="nome" value="{{old('nome', $produtor)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="cnpj" value="CNPJ:" />
                    <x-input id="cnpj" type="text" name="cnpj" value="{{old('cnpj', $produtor)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="telefone" value="Telefone:" />
                    <x-input id="telefone" type="text" name="telefone" value="{{old('telefone', $produtor)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="email" value="E-mail:" />
                    <x-input id="email" type="email" name="email" value="{{old('email', $produtor)}}"/>
                </x-form-control>

                <h1 class="mt-5 mb-3 text-primary text-2xl font-bold w-full">Endereço</h1>
                <x-form-control class="w-1/2 pr-4 pt-2">
                    <x-label for="cep" value="CEP:" />
                    <x-input type="text" id="cep" name="cep" value="{{old('cep',$produtor->endereco->cep)}}" onblur="pesquisacep(this.value)" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4 pt-2">
                    <x-label for="bairro" value="Bairro:" />
                    <x-input type="text" id="bairro" name="bairro" value="{{old('bairro',$produtor->endereco->bairro)}}" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="rua" value="Rua:" />
                    <x-input type="text" id="rua" name="rua" value="{{old('rua',$produtor->endereco->rua)}}" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="numero" value="Número:" />
                    <x-input id="numero" type="text" name="numero" value="{{old('numero',$produtor->endereco->numero)}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="estado" value="Estado:" />
                    <x-select id="estado" name="estado" value="{{old('estado')}}" required onchange="buscaCidades(this.value)">
                        <option value="" disabled>--Selecione o estado--</option>
                        <option value="AC" @if($produtor->endereco->estado == 'AC') selected @endif>Acre</option>
                        <option value="AL" @if($produtor->endereco->estado == 'AL') selected @endif>Alagoas</option>
                        <option value="AP" @if($produtor->endereco->estado == 'AP') selected @endif>Amapá</option>
                        <option value="AM" @if($produtor->endereco->estado == 'AM') selected @endif>Amazonas</option>
                        <option value="BA" @if($produtor->endereco->estado == 'BA') selected @endif>Bahia</option>
                        <option value="CE" @if($produtor->endereco->estado == 'CE') selected @endif>Ceará</option>
                        <option value="DF" @if($produtor->endereco->estado == 'DF') selected @endif>Distrito Federal</option>
                        <option value="ES" @if($produtor->endereco->estado == 'ES') selected @endif>Espírito Santo</option>
                        <option value="GO" @if($produtor->endereco->estado == 'GO') selected @endif>Goiás</option>
                        <option value="MA" @if($produtor->endereco->estado == 'MA') selected @endif>Maranhão</option>
                        <option value="MT" @if($produtor->endereco->estado == 'MT') selected @endif>Mato Grosso</option>
                        <option value="MS" @if($produtor->endereco->estado == 'MS') selected @endif>Mato Grosso do Sul</option>
                        <option value="MG" @if($produtor->endereco->estado == 'MG') selected @endif>Minas Gerais</option>
                        <option value="PA" @if($produtor->endereco->estado == 'PA') selected @endif>Pará</option>
                        <option value="PB" @if($produtor->endereco->estado == 'PB') selected @endif>Paraíba</option>
                        <option value="PR" @if($produtor->endereco->estado == 'PR') selected @endif>Paraná</option>
                        <option value="PE" @if($produtor->endereco->estado == 'PE') selected @endif>Pernambuco</option>
                        <option value="PI" @if($produtor->endereco->estado == 'PI') selected @endif>Piauí</option>
                        <option value="RJ" @if($produtor->endereco->estado == 'RJ') selected @endif>Rio de Janeiro</option>
                        <option value="RN" @if($produtor->endereco->estado == 'RN') selected @endif>Rio Grande do Norte</option>
                        <option value="RS" @if($produtor->endereco->estado == 'RS') selected @endif>Rio Grande do Sul</option>
                        <option value="RO" @if($produtor->endereco->estado == 'RO') selected @endif>Rondônia</option>
                        <option value="RR" @if($produtor->endereco->estado == 'RR') selected @endif>Roraima</option>
                        <option value="SC" @if($produtor->endereco->estado == 'SC') selected @endif>Santa Catarina</option>
                        <option value="SP" @if($produtor->endereco->estado == 'SP') selected @endif>São Paulo</option>
                        <option value="SE" @if($produtor->endereco->estado == 'SE') selected @endif>Sergipe</option>
                        <option value="TO" @if($produtor->endereco->estado == 'TO') selected @endif>Tocantins</option>
                    </x-select>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="cidade" value="Cidade:" />
                    <x-select id="cidade" name="cidade"  value="{{old('cidade')}}"></x-select>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="complemento" value="Complemento:" />
                    <x-input id="complemento" type="text" name="complemento" value="{{old('complemento',$produtor->endereco->complemento)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="ponto_referencia" value="Ponto de Referência:" />
                    <x-input id="ponto_referencia" type="text" name="ponto_referencia" value="{{old('ponto_referencia',$produtor->endereco->ponto_referencia)}}"/>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-around mt-4">
            <a href="{{route('produtores.show', $produtor)}}" class="bg-red-600 hover:bg-red-700 organosoft-btn">
                Cancelar
            </a>
            <x-button form="form">
                Atualizar
            </x-button>
        </div>
    </x-slot>
    @push('modals')
        <script src="{{asset('js/estado-cidade.js')}}"></script>
        <script>
            $(document).ready(function($) {
                buscaCidades(document.getElementById('estado').value);
                document.getElementById('cidade').value = {!! json_encode($produtor->endereco->cidade) !!};
            });

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
</x-auth>
