<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Usuario;

class GestorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $usuario = Usuario::find($this->id_usuario_gestor);

        return [
            'dni' => $usuario->dni,
            'nombre' => $usuario->nombre,
            'apellidos' => $usuario->apellido1 . " " . $usuario->apellido2,
        ];
    }
}
