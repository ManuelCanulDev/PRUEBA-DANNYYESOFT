<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TwEmpresaCorporativosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            "id" => $this->id,
            "S_RazonSocial" => $this->S_RazonSocial,
            "S_RFC" => $this->S_RFC,
            "S_Pais" => $this->S_Pais,
            "S_Estado" => $this->S_Estado,
            "S_Municipio" => $this->S_Municipio,
            "S_ColoniaLocalidad" => $this->S_ColoniaLocalidad,
            "S_Domicilio" => $this->S_Domicilio,
            "S_CodigoPostal" => $this->S_CodigoPostal,
            "S_UsoCFDI" => $this->S_UsoCFDI,
            "S_UrlRFC" => $this->S_UrlRFC,
            "S_UrlActaConstitutiva" => $this->S_UrlActaConstitutiva,
            "S_Activo" => $this->S_Activo,
            "S_Comentarios" => $this->S_Comentarios,
            "tw_corporativos_id" => $this->tw_corporativos,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
        ];
    }
}
