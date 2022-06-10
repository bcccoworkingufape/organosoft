<x-auth>
  <x-slot name="title">
    Relatórios
  </x-slot>
  <x-slot name="bg_main">
    <div class="organosoft-reports-grid">
      <!-- Criar mais desses para cada novo relatório -->
      <livewire:relatorio-veiculos></livewire:relatorio-veiculos>
      <livewire:relatorio-produtores></livewire:relatorio-produtores>
      <livewire:relatorio-granjas></livewire:relatorio-granjas>
      <livewire:relatorio-coletas></livewire:relatorio-coletas>
    </div>
    </div>
  </x-slot>
</x-auth>