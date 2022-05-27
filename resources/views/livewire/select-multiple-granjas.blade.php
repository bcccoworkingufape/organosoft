<div>
    <x-form-control class="w-full">
        <div>
            <x-label for="granjas" value="Granjas" />
            <small class="text-neutral-500">({{trans_choice('granjas', $countSelecionadas, ['value' => $countSelecionadas])}})</small>
        </div>
        <x-input placeholder="Digite para filtrar as granjas" id="granjas" type="text" wire:model="filtro"/>
    </x-form-control>
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 overflow-y-auto max-h-96">
        @foreach ($filtradas as $granja)
            <div @class([
                    "flex items-center shadow hover:shadow-lg hover:rounded transition duration-150 ease-in-out transform hover:scale-105 mx-1 p-3 cursor-pointer",
                    "bg-white hover:bg-primary-light" => $selecionadas[$granja->id] == false,
                    "bg-primary hover:bg-red-600" => $selecionadas[$granja->id] == true,
                ])
                wire:click="toggleSelecionado({{$granja->id}})">
                <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('img/logo-default.png') }}"/>
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">{{$granja->nome}}</p>
                </div>
            </div>
            <input type="hidden" name="granjas[]" value="{{$granja->id}}" @disabled(!$selecionadas[$granja->id])>
        @endforeach
    </div>
</div>
