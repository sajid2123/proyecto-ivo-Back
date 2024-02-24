<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_imagen';
    protected $fillable = [
        'id_prueba',
        'imagen',
    ];

    public function pruebas(){
        return $this->belongsTo(Prueba::class);
    }
}
