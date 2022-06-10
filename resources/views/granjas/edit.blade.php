<x-auth>

    <x-slot name="title">
        Editar Granja
    </x-slot>
    <x-slot name="bg_main">
        <form id="form" action="{{route('granjas.update', $granja)}}" method="POST" class="justify-center flex" enctype="multipart/form-data">
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
                <div class="mt-2 md:mt-0 w-full md:w-1/4 flex items-center justify-center">
                    <img src="/img/perfilGranja/{{$granja->imagem}}" alt="logo img" class="w-40 md:w-3/4">
                </div>
                <x-form-control class="w-full">
                    <x-label for="image" value="Imagem:" />
                    <x-input id="image" type="file" name="image" class="from-control-file"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="nome" value="Nome da Granja:" />
                    <x-input id="nome" type="text" name="nome" value="{{old('nome',$granja->nome)}}" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="quant_aves" value="Quantidade de Aves:" />
                    <x-input id="quant_aves" type="number" name="quant_aves" value="{{old('quant_aves',$granja->quant_aves)}}"/>
                </x-form-control>
                <h1 class="mt-5 mb-3 text-primary text-2xl font-bold w-full">Endereço</h1>
                <x-form-control class="w-1/2 pr-4 pt-2">
                    <x-label for="cep" value="CEP:" />
                    <x-input type="text" id="cep" name="cep" value="{{old('cep',$granja->endereco->cep)}}" onblur="pesquisacep(this.value)" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4 pt-2">
                    <x-label for="bairro" value="Bairro:" />
                    <x-input type="text" id="bairro" name="bairro" value="{{old('bairro',$granja->endereco->bairro)}}" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="rua" value="Rua:" />
                    <x-input type="text" id="rua" name="rua" value="{{old('rua',$granja->endereco->rua)}}" required/>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="numero" value="Número:" />
                    <x-input id="numero" type="text" name="numero" value="{{old('numero',$granja->endereco->numero)}}"/>
                </x-form-control>
                <x-form-control class="w-1/2 pr-4">
                    <x-label for="estado" value="Estado:" />
                    <x-select id="estado" name="estado" value="{{old('estado')}}" required onchange="buscaCidades(this.value)">
                        <option value="" disabled>--Selecione o estado--</option>
                        <option value="AC" @if($granja->endereco->estado == 'AC') selected @endif>Acre</option>
                        <option value="AL" @if($granja->endereco->estado == 'AL') selected @endif>Alagoas</option>
                        <option value="AP" @if($granja->endereco->estado == 'AP') selected @endif>Amapá</option>
                        <option value="AM" @if($granja->endereco->estado == 'AM') selected @endif>Amazonas</option>
                        <option value="BA" @if($granja->endereco->estado == 'BA') selected @endif>Bahia</option>
                        <option value="CE" @if($granja->endereco->estado == 'CE') selected @endif>Ceará</option>
                        <option value="DF" @if($granja->endereco->estado == 'DF') selected @endif>Distrito Federal</option>
                        <option value="ES" @if($granja->endereco->estado == 'ES') selected @endif>Espírito Santo</option>
                        <option value="GO" @if($granja->endereco->estado == 'GO') selected @endif>Goiás</option>
                        <option value="MA" @if($granja->endereco->estado == 'MA') selected @endif>Maranhão</option>
                        <option value="MT" @if($granja->endereco->estado == 'MT') selected @endif>Mato Grosso</option>
                        <option value="MS" @if($granja->endereco->estado == 'MS') selected @endif>Mato Grosso do Sul</option>
                        <option value="MG" @if($granja->endereco->estado == 'MG') selected @endif>Minas Gerais</option>
                        <option value="PA" @if($granja->endereco->estado == 'PA') selected @endif>Pará</option>
                        <option value="PB" @if($granja->endereco->estado == 'PB') selected @endif>Paraíba</option>
                        <option value="PR" @if($granja->endereco->estado == 'PR') selected @endif>Paraná</option>
                        <option value="PE" @if($granja->endereco->estado == 'PE') selected @endif>Pernambuco</option>
                        <option value="PI" @if($granja->endereco->estado == 'PI') selected @endif>Piauí</option>
                        <option value="RJ" @if($granja->endereco->estado == 'RJ') selected @endif>Rio de Janeiro</option>
                        <option value="RN" @if($granja->endereco->estado == 'RN') selected @endif>Rio Grande do Norte</option>
                        <option value="RS" @if($granja->endereco->estado == 'RS') selected @endif>Rio Grande do Sul</option>
                        <option value="RO" @if($granja->endereco->estado == 'RO') selected @endif>Rondônia</option>
                        <option value="RR" @if($granja->endereco->estado == 'RR') selected @endif>Roraima</option>
                        <option value="SC" @if($granja->endereco->estado == 'SC') selected @endif>Santa Catarina</option>
                        <option value="SP" @if($granja->endereco->estado == 'SP') selected @endif>São Paulo</option>
                        <option value="SE" @if($granja->endereco->estado == 'SE') selected @endif>Sergipe</option>
                        <option value="TO" @if($granja->endereco->estado == 'TO') selected @endif>Tocantins</option>
                    </x-select>
                </x-form-control>
                <x-form-control class="w-1/2 pl-4">
                    <x-label for="cidade" value="Cidade:" />
                    <x-select id="cidade" name="cidade"  value="{{old('cidade')}}"></x-select>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="complemento" value="Complemento:" />
                    <x-input id="complemento" type="text" name="complemento" value="{{old('complemento',$granja->endereco->complemento)}}"/>
                </x-form-control>
                <x-form-control class="w-full">
                    <x-label for="ponto_referencia" value="Ponto de Referência:" />
                    <x-input id="ponto_referencia" type="text" name="ponto_referencia" value="{{old('ponto_referencia',$granja->endereco->ponto_referencia)}}"/>
                </x-form-control>
            </x-form>
        </form>
        <div class="flex justify-center">
            <x-button class="mt-4" form="form">
                Cadastrar
            </x-button>
        </div>
    </x-slot>
    <script src="{{asset('js/estado-cidade.js')}}"></script>

    <script>
        $(document).ready(function($) {
            buscaCidades(document.getElementById('estado').value);
            document.getElementById('cidade').value = {!! json_encode($granja->endereco->cidade) !!};
        });
    </script>
</x-auth>
