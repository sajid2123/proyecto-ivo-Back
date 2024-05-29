<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Donante extends Model
{
    use HasFactory, HasApiTokens;

    // Especifica el nombre de la tabla si no sigue la convención de nombres pluralizada de Laravel
    protected $table = 'donantes';

    // Especifica el nombre de la clave primaria si no es 'id'
    protected $primaryKey = 'idDonante';

    // Deshabilita timestamps si la tabla no los tiene
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'correo',
        'cpostal',
        'direccion',
        'contraseña'
    ];

    
}
