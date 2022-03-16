<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class tw_empresas_corporativos extends Model
{
    use SoftDeletes;

    public function tw_corporativos()
    {
        return $this->belongsTo(tw_corporativos::class);
    }
}
