<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TwContratoCorporativosCollection extends ResourceCollection
{
    public $collects = TwContratoCorporativosResource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
