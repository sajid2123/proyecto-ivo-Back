<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_diagnostico',
        'informe',
        'tratamiento',
        'fecha_creacion',
        'id_medico',
        'id_paciente'
    ];

    public function medicos(){
        return $this->belongsTo(Medico::class);
    }

    public function pacientes(){
        return $this->belongsTo(Paciente::class);
    }

}
