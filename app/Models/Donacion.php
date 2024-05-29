<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donaciones'; 

    protected $primaryKey = 'idDonacion'; 

    protected $fillable = [ 
        'titulo',
        'total_donaciones',
        'total_cantidad',
        'objetivo',
        'descripcion',
        'fecha_limite',
        'imagen'
    ];
}
