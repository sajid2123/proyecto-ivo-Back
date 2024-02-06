<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'dni', 'nombre', 'apellido1', 'apellido2', 'Sexo', 
        'fecha_nacimiento', 'correo', 'codigo_postal', 
        'direccion', 'nombre_cuenta', 'contraseña', 'id_rol'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }

    
    public function gestor()
    {
        return $this->hasOne(Gestor::class, 'id_usuario_gestor');
    }
    
    public function administrativo()
    {
        return $this->hasOne(Administrativo::class, 'id_usuario_administrativo');
    }  
    
    
    public function medico()
    {
        return $this->hasOne(Medico::class, 'id_usuario_medico');
    }  
    
    
    public function paciente()
    {
        return $this->hasOne(Administrativo::class, 'id_usuario_paciente');
    }   


    public function radiologo()
    {
        return $this->hasOne(Administrativo::class, 'id_usuario_radiolog');
    }   

    
}
