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
        Schema::create('pruebas', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id_prueba'); // Clave primaria
            $table->string('informe', 255);
            $table->string('imagen', 255);
            $table->date('fecha');
            $table->unsignedBigInteger('id_usuario_radiologo');
            $table->unsignedBigInteger('id_usuario_paciente');
            $table->unsignedBigInteger('id_usuario_medico');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_usuario_radiologo')->references('id_usuario_radiologo')->on('radiologo');
            $table->foreign('id_usuario_medico')->references('id_usuario_medico')->on('medico');
            $table->foreign('id_usuario_paciente')->references('id_usuario_paciente')->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruebas');
    }
};
