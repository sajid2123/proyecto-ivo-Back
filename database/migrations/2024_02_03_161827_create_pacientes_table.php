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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_paciente')->primary();
            $table->unsignedBigInteger('id_usuario_administrativo');
            $table->string('sip');
            $table->foreign('id_usuario_paciente')->references('id_usuario')->on('usuarios');
            $table->foreign('id_usuario_administrativo')->references('id_usuario_administrativo')->on('administrativos'); //Clave ajena
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
