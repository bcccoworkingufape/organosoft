<x-auth>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="no_bg_main">
        Exemplo de tela que precisa fazer um layout mais complexo, por isso usar 
        <code>x-slot[name="no-bg"]</code> ou seja, sem fundo, aqui você vai precisar criar o próprio layout, 
        como um grid para um dashboard por exemplo, consulte Tailwind para facilitar.
        Exemplos abaixo:
        <div class="flex flex-wrap gap-2">
            <x-card class="w-full">
                Card 1
            </x-card>
            <x-card class="w-full md:w-96">
                Card 2
            </x-card>
            <x-card class="w-full md:w-48">
                Card 3
            </x-card>
        </div>
    </x-slot>
</x-auth>
