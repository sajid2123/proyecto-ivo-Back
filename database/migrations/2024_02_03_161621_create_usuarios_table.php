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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('dni', 9);
            $table->string('nombre', 255);
            $table->string('apellido1', 255);
            $table->string('apellido2', 255);
            $table->string('Sexo', 50);
            $table->date('fecha_nacimiento');
            $table->string('correo', 255);
            $table->integer('codigo_postal');
            $table->string('direccion', 255);
            $table->string('nombre_cuenta', 255);
            $table->string('contraseña', 255);
            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('rols');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
