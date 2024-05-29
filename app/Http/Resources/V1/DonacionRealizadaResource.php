<?php

namespace App\Http\Resources\V1;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonacionRealizadaResource extends JsonResource
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
            'id' => $this->id,
            'id_donacion' => $this->idDonacion,
            'id_donante' => $this->idDonante,
            'cantidad_donada' =>$this->cantidad_donada,
            'fecha' =>$this->fecha,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
