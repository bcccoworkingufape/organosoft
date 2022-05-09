<x-auth>
    <x-slot name="title">
        Atualizar Produtor
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('produtores.update', $produtor)}}" method="POST" class="justify-center flex">
            @csrf
            @method('PUT')
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
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
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="CEP" value="CEP:" />
                    <x-input id="cep" type="cep" name="cep" value="{{old('cep', $produtor->endereco->cep)}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="bairro" value="Bairro:" />
                    <x-input id="bairro" type="bairro" name="bairro" value="{{old('bairro', $produtor->endereco->bairro)}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="rua" value="Rua:" />
                    <x-input id="rua" type="rua" name="rua" value="{{old('rua', $produtor->endereco->rua)}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="numero" value="Número:" />
                    <x-input id="numero" type="numero" name="numero" value="{{old('numero',  $produtor->endereco->numero)}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="estado" value="Estado:" />
                    <x-input id="estado" type="estado" name="estado" value="{{old('estado', $produtor->endereco->estado)}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="cidade" value="Cidade:" />
                    <x-input id="cidade" type="cidade" name="cidade" value="{{old('cidade', $produtor->endereco->cidade)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="complemento" value="Complemento:" />
                    <x-input id="complemento" type="complemento" name="complemento" value="{{old('complemento', $produtor->endereco->complemento)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="pontoReferencia" value="Ponto de Referência:" />
                    <x-input id="pontoReferencia" type="pontoReferencia" name="pontoReferencia" value="{{old('pontoReferencia', $produtor->endereco->ponto_referencia)}}"/>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Atualizar
            </x-button>
        </div>
    </x-slot>
    @push('modals')
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
