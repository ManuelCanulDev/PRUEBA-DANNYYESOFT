<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TwContactosCorporativosCollection extends ResourceCollection
{
    public $collects = TwContactosCorporativosResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
