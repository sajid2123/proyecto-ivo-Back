<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radiologo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario_radiologo', 
        'id_usuario_gestor',
        'id_servicio',
    ];
    protected $table = 'radiologos';
    protected $primaryKey = 'id_usuario_radiologo';
    public $incrementing = false;
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_radiologo', 'id_usuario');
    }
}
