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
        Schema::create('administrativos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario_administrativo')->primary();
            $table->unsignedBigInteger('id_usuario_gestor');

            $table->foreign('id_usuario_administrativo')->references('id_usuario')->on('usuarios');
            $table->foreign('id_usuario_gestor')->references('id_usuario_gestor')->on('gestors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrativos');
    }
};
