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