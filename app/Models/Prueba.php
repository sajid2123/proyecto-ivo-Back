<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = [
        'informe',
        'imagen',
        'fecha',
        'id_usuario_medico',
        'id_usuario_paciente',
        'id_usuario_radiologo',
    ];

    public function pacientes(){
        return $this->belongsTo(Paciente::class);
    }

    public function radiologos(){
        return $this->belongsTo(Radiologo::class);
    }

    public function medicos(){
        return $this->hasMany(Medico::class);
    }

}
