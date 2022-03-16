<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TwContactosCorporativosResource extends JsonResource
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
            "id" => $this->id,
            "S_Nombre" => $this->S_Nombre,
            "S_Puesto" => $this->S_Puesto,
            "S_Comentarios" => $this->S_Comentarios,
            "N_TelefonoFijo" => $this->N_TelefonoFijo,
            "N_TelefonoMovil" => $this->N_TelefonoMovil,
            "S_Email" => $this->S_Email,
            "tw_corporativos_id" => $this->tw_corporativos,
        ];
    }
}
