<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('caminho_documento');
            $table->string('status');
            $table->string('frequencia_coleta');
            $table->text('observacao')->nullable();
            $table->decimal('valor', 15, 2);
            $table->date('inicio');
            $table->date('fim');
            $table->foreignId('produtor_id')->constrained('produtores');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};
