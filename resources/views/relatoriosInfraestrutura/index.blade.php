<x-auth>
  <x-slot name="title">
    Relatórios
  </x-slot>
  <x-slot name="bg_main">
    <div class="organosoft-reports-grid">
      <!-- Criar mais desses para cada novo relatório -->
      <livewire:relatorio-veiculos></livewire:relatorio-veiculos>
      <livewire:relatorio-produtores></livewire:relatorio-produtores>

    </div>
  </x-slot>
</x-auth>