<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TwContratoCorporativosResource extends JsonResource
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
            'D_FechaInicio' => $this->D_FechaInicio,
            'D_FechaFin' => $this->D_FechaFin,
            'S_URLContrato' => $this->S_URLContrato,
            'tw_corporativos_id' => $this->tw_corporativos
        ];
    }
}
