<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tw_contratos_corporativos extends Model
{
    public $timestamps = false;

    public function tw_corporativos()
    {
        return $this->belongsTo(tw_corporativos::class);
    }
}
