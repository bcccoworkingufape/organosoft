<x-auth>
    <x-slot name="title">
    </x-slot>
    <x-slot name="bg_main">
        <div class="organosoft-vehicle-details">
            <div class="organosoft-vehicle-details__icon">
                <img src="{{asset('img/car.svg')}}" alt="link editar">
            </div>
            <div class="organosoft-vehicle-details__info">
                <a href="{{route('veiculos.show', $veiculo)}}" class="flex w-full text-primary text-3xl font-bold">{{$veiculo->marca}}</a>
                <p class="text-sm text-gray-500">{{$veiculo->placa}}</p>
            </div>
        </div>
        <x-slot name="bottom_buttons">
            <x-link href="{{route('veiculos.edit', $veiculo)}}" >
                <img src="{{asset('img/pencil-white.svg')}}" alt="link editar">
                Editar Cadastro
            </x-link>
            <livewire:deletar-veiculo :veiculo="$veiculo" :cor="'white'">
        </x-slot>
    </x-slot>
    <x-slot name="side_content">
        <x-card></x-card>
        <x-card></x-card>
        <x-card></x-card>
    </x-slot>

</x-auth>
