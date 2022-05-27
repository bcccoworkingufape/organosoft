<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Fabrica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fabricas')->insert([
            'id' => '1',
            'nome' => 'Fábrica 1',
            'descricao' => 'Descrição da Fábrica 1'
        ]);
    }
}
