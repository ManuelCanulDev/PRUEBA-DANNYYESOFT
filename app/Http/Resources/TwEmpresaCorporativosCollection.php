<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TwEmpresaCorporativosCollection extends ResourceCollection
{
    public $collects = TwEmpresaCorporativosResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
