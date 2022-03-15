<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TwDocumentosCorporativoResource extends JsonResource
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
            'tw_corporativos_id' => $this->tw_corporativos_id,
            'tw_documentos_id' => $this->tw_documentos_id,
            'S_ArchivoUrl' => $this->S_ArchivoUrl,
        ];
    }
}
