<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario_administrativo', 
        'id_usuario_gestor',
    ];

    protected $table = 'administrativos';
    protected $primaryKey = 'id_usuario_administrativo';
    public $incrementing = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_administrativo', 'id_usuario');
    }
    public function gestor()
    {
        return $this->belongsTo(Gestor::class, 'id_usuario_gestor', 'id_usuario');
    }
}
