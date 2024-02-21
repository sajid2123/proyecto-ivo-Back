<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Usuario
{
    use HasFactory;

    protected $table = 'pacientes';
    protected $primaryKey = 'id_usuario_paciente';
    public $incrementing = false;

    protected $fillable = [
        'id_usuario_paciente',
        'id_usuario_administrativo'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_paciente');
    }

    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class, 'id_paciente');
    }

    public function pruebas()
    {
        return $this->hasMany(Prueba::class, 'id_usuario_paciente');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_usuario_paciente');
    }

    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'id_usuario_administrativo');
    }
}
