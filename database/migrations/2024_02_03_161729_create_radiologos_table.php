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
        Schema::create('radiologos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_radiologo')->primary();
            $table->unsignedBigInteger('id_usuario_gestor');
            $table->unsignedBigInteger('id_servicio');
            

            $table->foreign('id_usuario_gestor')->references('id_usuario_gestor')->on('gestors');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
            $table->foreign('id_usuario_radiologo')->references('id_usuario')->on('usuarios');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiologos');
    }
};
