<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestorServicio extends Model
{
    use HasFactory;
    protected $table = 'gestor_servicios';

    protected $fillable = [
        'id_servicio',
        'id_usuario_gestor',
        'fecha', 
    ];
}
