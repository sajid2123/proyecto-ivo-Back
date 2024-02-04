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
        Schema::create('imagens', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger('id_prueba');
            $table->string('imagen', 255);
            $table->timestamps();

            // Clave primaria compuesta
            $table->primary(['id_prueba', 'imagen']);

            // Clave ajena
            $table->foreign('id_prueba')->references('id_prueba')->on('pruebas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagens');
    }
};
