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
        Schema::create('qualidade_coletas', function (Blueprint $table) {
            $table->id();
            $table->string("avaliacaoQualidade");
            $table->string("descricao");

            $table->foreignId('id_coleta')->constrained('coletas');
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
        Schema::dropIfExists('qualidade_coletas');
    }
};
