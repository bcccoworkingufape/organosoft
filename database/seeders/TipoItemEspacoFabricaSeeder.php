<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoItemEspacoFabricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Produtos
        // Insumos
        // Resíduos
        DB::table('tipo_item_espaco_fabrica')->insert([
            'id' => '1',
            'nome' => 'Produtos',
            'descricao' => 'Produtos',
            'fabricas_id' => 1
        ]);
        DB::table('tipo_item_espaco_fabrica')->insert([
            'id' => '2',
            'nome' => 'Insumos',
            'descricao' => 'Insumos',
            'fabricas_id' => 1
        ]);
        DB::table('tipo_item_espaco_fabrica')->insert([
            'id' => '3',
            'nome' => 'Resíduos',
            'descricao' => 'Resíduos',
            'fabricas_id' => 1
        ]);
    }
}
