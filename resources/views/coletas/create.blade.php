<x-auth>

    <x-slot name="title">
        Agendar Coleta
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('coleta.create')}}" method="POST" class="justify-center flex">
            @csrf
            <x-form class="pt-4 w-2/3 flex flex-wrap">
                <input type="hidden" name="id_granja" value="{{$granja}}" /> <br>
                <div class="w-full">
                    <x-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <x-form-control class="w-1/2 pl-4" >
                    <x-label for="data" value="Data da coleta:" />
                    <x-input id="data" type="date" name="data" value=""/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="hora" value="Hora da Coleta:" />
                    <x-input id="hora" type="time" name="hora" value="" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="motorista" value="Motorista:" />
                    <x-input id="motorista" type="text" name="motorista" value="" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="status" value="Status:" />
                    <x-select id="status" name="status" required>
                        <option value="" disabled selected>-- Status --</option>
                        <option value="preparacao">Preparação</option>
                        <option value="despacho">Despacho</option>
                        <option value="em_rota">Em rota</option>
                        <option value="entregue">Entregue</option>
                    </x-select>
                </x-form-control>
                <x-form-control class="w-full pl-4">
                    <x-label for="observacao" value="Observação:" />
                    <x-input id="observacao" type="text" name="observacao" value="" required/>
                </x-form-control>
            </x-form>
        </form>
        
        @if($contratoValido == 1)
            <div class="flex justify-center">
                <x-button class="mt-4" form="form">
                    Salvar
                </x-button>
            </div>
        @else
            <div class="flex justify-center">
                <x-button disabled class="mt-4" form="form" >
                    Salvar
                </x-button>
            </div>
            <x-form-control class="w-full pl-4 justify-center">
                <x-label for="error" value="Granja não possui contrato válido!" />
            </x-form-control>
        @endif
        
    </x-slot>
    <script src="{{asset('js/estado-cidade.js')}}"></script>
</x-auth>
