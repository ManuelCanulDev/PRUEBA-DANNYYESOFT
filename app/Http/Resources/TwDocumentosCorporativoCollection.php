<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TwDocumentosCorporativoCollection extends ResourceCollection
{
    public $collects = TwDocumentosCorporativoResource::class;

    public function toArray($request)
    {
        return [
            $this->collection,
        ];
    }
}
