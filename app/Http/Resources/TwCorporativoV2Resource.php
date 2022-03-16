<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TwCorporativoV2Resource extends JsonResource
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
            'S_NombreCorto' => $this->S_NombreCorto,
            'S_NombreCompleto' => $this->S_NombreCompleto,
            'S_LogoURL' => $this->S_LogoURL,
            'S_DBName' => $this->S_DBName,
            'S_DBUsuario' => $this->S_DBUsuario,
            'S_DBPassword' => $this->S_DBPassword,
            'S_SystemUrl' => $this->S_SystemUrl,
            'S_Activo' => $this->S_Activo,
            'D_FechaIncorporacion' => $this->D_FechaIncorporacion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tw_usuarios_id' => $this->tw_usuarios_id,
            'FK_Asignado_id' => $this->FK_Asignado_id,
        ];
    }
}
