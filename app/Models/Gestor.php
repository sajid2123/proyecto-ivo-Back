<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario_gestor', 
    ];

    protected $table = 'gestors';
    protected $primaryKey = 'id_usuario_gestor';
    public $incrementing = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_gestor', 'id_usuario');
    }
}
