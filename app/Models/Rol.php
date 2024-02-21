<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha_creacion',
    ];

    protected $table = 'rols'; 

    protected $primaryKey = 'id_rol'; 

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol', 'id_rol');
    }
}
