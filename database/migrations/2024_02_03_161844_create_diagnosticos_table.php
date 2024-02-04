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
        Schema::create('diagnosticos', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id_diagnostico'); // Clave primaria
            $table->text('informe');
            $table->text('tratamiento');
            $table->date('fecha_creacion');
            $table->unsignedBigInteger('id_medico');
            $table->unsignedBigInteger('id_paciente');
            $table->timestamps(); 

            // Claves foráneas
            $table->foreign('id_medico')->references('id_usuario_medico')->on('medico');
            $table->foreign('id_paciente')->references('id_usuario_paciente')->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
