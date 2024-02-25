<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Usuario;
use App\Models\Radiologo;
use App\Models\Servicio;

class PruebaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $radiologo = Usuario::find($this->id_usuario_radiologo);
        $servicioRadiologo = Radiologo::find($radiologo->id_usuario);

        $servicio = Servicio::find($servicioRadiologo->id_servicio);

        return [
            'id_prueba' => $this->id_prueba,
            'informe' => $this->informe,
            'fecha' => $this->fecha,
            'medico' => $radiologo->nombre . " " . $radiologo->apellido1 . " " . $radiologo->apellido2,  
            'servicio' => $servicio->nombre_servicio,
        ];
    }
}
