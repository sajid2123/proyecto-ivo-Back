<?php

namespace App\Http\Resources\V1;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Usuario;

class CitaMedicoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $paciente = Usuario::find($this->id_usuario_paciente);
     
        return [
            'sip' => $this->sip,
            'nombre' => $paciente->nombre,
            'apellido' => $paciente->apellido1 . " " . $paciente->apellido2,
            'hora' => $this->hora,
            'id_cita' => $this->id_cita,
            'estado' => $this->estado
        ];
    }
}
