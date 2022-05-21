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
        Schema::create('coletas', function (Blueprint $table) {
            $table->id();
            $table->time("hora");
            $table->date("data");
            $table->string("status");

            #$table->foreignId('id_contrato')->references('id')->on('contratos');
            #$table->foreignId('id_veiculo')->references('id')->on('veiculos');
            $table->foreignId('id_granja')->references('id')->on('granjas');

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
        Schema::dropIfExists('coletas');
    }
};
