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
        Schema::drop('veiculos');
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('placa');
            $table->string('chassi');
            $table->string('ano');
            $table->unsignedBigInteger('categorias_veiculos_id');
            $table->foreign('categorias_veiculos_id')->references('id')->on('categoria_veiculos')->onDelete('cascade');
            $table->unsignedBigInteger('fabrica_id');
            $table->foreign('fabrica_id')->references('id')->on('fabricas');
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
        Schema::drop('veiculos');
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('placa')->unique();
            $table->string('chassi')->unique();
            $table->string('ano');
            $table->timestamps();
        });
    }
};
