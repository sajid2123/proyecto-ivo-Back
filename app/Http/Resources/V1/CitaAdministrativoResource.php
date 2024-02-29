<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Usuario;
use App\Models\Servicio;
class CitaAdministrativoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $medico = Usuario::find($this->id_usuario_medico);
        $paciente = Usuario::find($this->id_usuario_paciente);
        $radiologo = Usuario::find($this->id_usuario_radiologo);
        $servicio = Servicio::find($this->id_servicio);

        return [
            'sip' => $this->sip,
            'hora' => $this->hora,
            'id_cita' => $this->id_cita,
            'id_paciente' => $this->id_usuario_paciente,
            'nombre_paciente' => $paciente->nombre,
            'apellidos_paciente' => $paciente->apellido1 . " " . $paciente->apellido2,
            'nombre_medico' => $medico->nombre ?? $radiologo->nombre,
            'servicio' => $servicio -> nombre_servicio
        ];
    }
}
