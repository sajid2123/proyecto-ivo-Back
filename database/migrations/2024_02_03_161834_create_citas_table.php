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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id_cita');
            $table->string('sip');
            $table->dateTime('hora');
            $table->string('servicio');
            $table->unsignedBigInteger('id_usuario_medico');
            $table->unsignedBigInteger('id_usuario_administrativo');
            $table->unsignedBigInteger('id_usuario_paciente');
            $table->unsignedBigInteger('id_usuario_radiologo');

            // Claves foráneas
            $table->foreign('id_usuario_medico')->references('id_usuario_medico')->on('medicos');
            $table->foreign('id_usuario_administrativo')->references('id_usuario_administrativo')->on('administrativos');
            $table->foreign('id_usuario_paciente')->references('id_usuario_paciente')->on('pacientes');
            $table->foreign('id_usuario_radiologo')->references('id_usuario_radiologo')->on('radiologos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
