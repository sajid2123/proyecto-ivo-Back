<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonacionRealizada extends Model
{
    use HasFactory;

    protected $table = 'donaciones_realizadas';

    protected $primaryKey = 'idDonacionRealizada';

    public $timestamps = false;

    protected $fillable = [
        'idDonacion',
        'fecha',
        'cantidad_donada'
    ];

    // Definir relaciones con otras tablas, si es necesario
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'idDonacion', 'idDonacion');
    }

    public function donante()
    {
        return $this->belongsTo(Donante::class, 'idDonante', 'idDonante');
    }
}
