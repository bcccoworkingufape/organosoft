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
        Schema::table('espacos_fabricas', function (Blueprint $table) {
            $table->text('observacoes')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('espacos_fabricas', function (Blueprint $table) {
            $table->text('observacoes')->required()->change();
            $table->dropColumn('observacoes');
        });
    }
};
