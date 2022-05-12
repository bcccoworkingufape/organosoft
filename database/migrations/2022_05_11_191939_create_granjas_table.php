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
        Schema::create('granjas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('quant_aves')->nullable();
            $table->foreignId('produtores_id')->constrained();
            $table->foreignId('endereco_id')->constrained();
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
        Schema::dropIfExists('granjas');
    }
};
