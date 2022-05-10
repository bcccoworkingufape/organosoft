<x-auth>
    <x-slot name="title">
        Cadastrar Produtor
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('produtores.store')}}" method="POST" class="justify-center flex">
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
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="CEP" value="CEP:" />
                    <x-input id="cep" type="text" name="cep" value="{{old('cep')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="bairro" value="Bairro:" />
                    <x-input id="bairro" type="text" name="bairro" value="{{old('bairro')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="rua" value="Rua:" />
                    <x-input id="rua" type="text" name="rua" value="{{old('rua')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="numero" value="Número:" />
                    <x-input id="numero" type="text" name="numero" value="{{old('numero')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="estado" value="Estado:" />
                    <x-input id="estado" type="text" name="estado" value="{{old('estado')}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="cidade" value="Cidade:" />
                    <x-input id="cidade" type="text" name="cidade" value="{{old('cidade')}}"/>
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
        <script>
           $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
           $("#cep").mask("99999-999");
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
