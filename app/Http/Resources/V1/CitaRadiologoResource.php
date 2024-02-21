<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Usuario;

class CitaRadiologoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $usuario = Usuario::find($this->id_usuario_paciente);


        return [
            'id_cita' => $this->id_cita,
            'sip' => $this->sip,
            'hora' => $this->hora,
            'id_paciente' => $this->id_usuario_paciente,
            'nombre' => $usuario->nombre,
            'apellidos' => $usuario->apellido1 . " " . $usuario->apellido2,
        ];
    }
}
