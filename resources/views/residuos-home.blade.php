<x-auth>
    <x-slot name="title">
        Residuos Teste!
    </x-slot>
    <x-slot name="bg_main">
        Esse é um exemplo de uma página que pode ter um form ou uma table
        Use o <code>x-slot[name="side_content"]</code> para colocar widgets ao lado da página
        <x-form class="pt-4">
            <h2 class="text-xl font-bold">Form de cadastro de exemplo</h2>
            <x-form-control>
                <x-label for="input1" value="Exemple input 1" />
                <x-input id="input1" class="w-full" type="text" name="input1" placeholder="Digite aqui o texto de exemplo"/>
            </x-form-control>
            <x-form-control>
                <x-label for="input1" value="Exemple input 2" />
                <x-input id="input2" class="w-full" type="text" name="input2" placeholder="Digite aqui o texto de exemplo"/>
            </x-form-control>
            <x-form-control>
                <x-label for="select" value="Estados"></x-label>
                <x-select name="estados" id="estados">
                    <option value="" disabled selected>Selecione uma opção</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PB">Paraíba</option>
                </x-select>
            </x-form-control>
            <x-form-control>
                <x-label for="data" value="Data de nascimento"></x-label>
                <x-datepicker type="date" name="data" id="data" />
            </x-form-control>
            <x-form-control>
                <x-radio name="radios" id="opcao1">Opção 1</x-radio>
                <x-radio name="radios" id="opcao2">Opção 2</x-radio>
            </x-form-control>
            <x-form-control>
                <x-label>
                    <x-checkbox></x-checkbox>
                    Exemplo de checkbox
                </x-label>
            </x-form-control>
            <div class="w-full flex justify-center">
                <x-button class="mt-4">
                    Submeter
                </x-button>
            </div>
        </x-form>
    </x-slot>
    <x-slot name="side_content">
        <x-button>Exemplo</x-button>
        <x-card>
            Qualquer card com alguma coisa dentro
        </x-card>
    </x-slot>
</x-auth>
