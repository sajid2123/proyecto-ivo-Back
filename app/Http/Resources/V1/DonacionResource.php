<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->idDonacion,
            'titulo' => $this->titulo,
            'total_donaciones' => $this->total_donaciones,
            'total_cantidad' => $this->total_cantidad,
            'objetivo' => $this->objetivo,
            'descripcion' => $this->descripcion
        ];
    }
}
