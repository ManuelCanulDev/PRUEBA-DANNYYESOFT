<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TwCorporativosCollection extends ResourceCollection
{
    public $collects = TwCorporativoV2Resource::class;

    public function toArray($request)
    {
        return $this->collection;
    }
}
