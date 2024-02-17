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
        Schema::table('citas', function (Blueprint $table) {
            // Convertir id_usuario_medico en nulo
            $table->unsignedBigInteger('id_usuario_medico')->nullable()->change();

            // Convertir id_usuario_radiologo en nulo
            $table->unsignedBigInteger('id_usuario_radiologo')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            // Revertir cambios si es necesario
            $table->unsignedBigInteger('id_usuario_medico')->nullable(false)->change();
            $table->unsignedBigInteger('id_usuario_radiologo')->nullable(false)->change();
        });
    }
};
