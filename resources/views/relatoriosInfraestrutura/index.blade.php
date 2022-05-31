<x-auth>
  <x-slot name="title">
    Relatórios
  </x-slot>
  <x-slot name="bg_main">
    <div class="organosoft-reports-grid">
      <!-- Criar mais desses para cada novo relatório -->
      <livewire:relatorio-veiculos></livewire:relatorio-veiculos>
      <livewire:relatorio-maquinas></livewire:relatorio-maquinas>
      <livewire:relatorio-espacos-fabrica></livewire:relatorio-espacos-fabrica>
      <livewire:relatorio-categoria-veiculos></livewire:relatorio-categoria-veiculos>
      <livewire:relatorio-equipamentos></livewire:relatorio-equipamentos>
    </div>
  </x-slot>
</x-auth>
