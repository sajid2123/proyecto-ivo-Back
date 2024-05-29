<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Rol;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $rol = Rol::find($this->id_rol);
        return [
            'dni' => $this->dni,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellido1 . ' ' . $this->apellido2,
            'Rol' => $rol->nombre,
            'Contraseña' => $this->password,
            'correo' => $this-> correo
        ];
    }
}
