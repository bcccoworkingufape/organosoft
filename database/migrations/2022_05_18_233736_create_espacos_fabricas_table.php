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
        Schema::create('espacos_fabricas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('tipo_item_espaco_fabrica_id');
            $table->text('observacoes');
            $table->decimal('largura');
            $table->decimal('comprimento');
            $table->decimal('altura');
            $table->foreignId('fabrica_id');
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
        Schema::dropIfExists('espacos_fabricas');
    }
};
