<x-auth>
    <x-slot name="title">
        Cadastrar Categoria de Veículo
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('categoriaVeiculos.store')}}" method="POST" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-form-control class="w-full">
                    <x-label for="descricao" value="Descrição:" />
                    <x-input id="descricao" type="text" name="descricao" value="{{old('descricao')}}"/>
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