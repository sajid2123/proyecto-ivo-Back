<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pruebas', function (Blueprint $table) {
             // Añade la columna id_cita. Asegúrate de usar el tipo de dato adecuado.
             $table->unsignedBigInteger('id_cita');
             // Define la columna id_cita como clave ajena que referencia a la columna id en la tabla citas.
             $table->foreign('id_cita')->references('id_cita')->on('citas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pruebas', function (Blueprint $table) {
            //
        });
    }
};
