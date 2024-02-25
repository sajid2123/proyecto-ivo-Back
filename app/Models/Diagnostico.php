<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_diagnostico';
    protected $fillable = [
        'informe',
        'tratamiento',
        'fecha_creacion',
        'id_medico',
        'id_paciente',
        'id_cita',
        'volante',
    ];

    public function medicos(){
        return $this->belongsTo(Medico::class);
    }

    public function pacientes(){
        return $this->belongsTo(Paciente::class);
    }

    public function id_cita(){
        return $this->belongsTo(Cita::class);
    }

}
