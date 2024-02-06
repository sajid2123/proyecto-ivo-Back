<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;
    

    protected $table = 'administrativos';
    protected $primaryKey = 'id_usuario_administrativo';
    public $incrementing = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_administrativo', 'id_usuario');
    }
}
