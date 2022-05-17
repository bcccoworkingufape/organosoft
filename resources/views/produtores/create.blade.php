<x-auth>
    <x-slot name="title">
        Cadastrar Produtor
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('produtores.store')}}" method="POST" class="justify-center flex">
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

                <x-form-control class="w-full">
                    <x-label for="nome" value="Nome:" />
                    <x-input id="nome" type="text" name="nome" value="{{old('nome')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="cnpj" value="CNPJ:" />
                    <x-input id="cnpj" type="text" name="cnpj" value="{{old('cnpj')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="telefone" value="Telefone:" />
                    <x-input id="telefone" type="text" name="telefone" value="{{old('telefone')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="email" value="E-mail:" />
                    <x-input id="email" type="email" name="email" value="{{old('email')}}"/>
                </x-form-control>

                <h1 class="mt-5 mb-3 text-primary text-2xl font-bold w-full">Endereço</h1>
                <x-form-control class="w-1/2 pr-4 pt-2">
                    <x-label for="cep" value="CEP:" />
                    <x-input type="text" id="cep" name="cep" value="{{old('cep')}}" onblur="pesquisacep(this.value)" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4 pt-2">
                    <x-label for="bairro" value="Bairro:" />
                    <x-input type="text" id="bairro" name="bairro" value="{{old('bairro')}}" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="rua" value="Rua:" />
                    <x-input type="text" id="rua" name="rua" value="{{old('rua')}}" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="numero" value="Número:" />
                    <x-input id="numero" type="text" name="numero" value="{{old('numero')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="estado" value="Estado:" />
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
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="cidade" value="Cidade:" />
                    <x-select id="cidade" name="cidade" value="{{old('cidade')}}" required></x-select>

                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="complemento" value="Complemento:" />
                    <x-input id="complemento" type="text" name="complemento" value="{{old('complemento')}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="ponto_referencia" value="Ponto de Referência:" />
                    <x-input id="ponto_referencia" type="text" name="ponto_referencia" value="{{old('ponto_referencia')}}"/>
                </x-form-control>
            </x-form>

        </form>


        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Cadastrar
            </x-button>
        </div>
    </x-slot>
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
</x-auth>
