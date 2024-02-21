<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            // Eliminar la columna existente 'servicio'
            $table->dropColumn('servicio');

            // Agregar nueva columna 'id_servicio' referenciada con 'id_servicio' de la tabla 'servicios'
            $table->bigInteger('id_servicio')->unsigned();
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            // Revertir cambios: eliminar la columna 'id_servicio' y agregar de nuevo 'servicio'
            $table->dropForeign(['id_servicio']);
            $table->dropColumn('id_servicio');
            $table->string('servicio');
        });
    }
};

