<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tw_documentos_corporativos extends Model
{
    public $timestamps = false;

    public function tw_corporativos()
    {
        return $this->belongsTo(tw_corporativos::class);
    }

    public function tw_documentos()
    {
        return $this->belongsTo(tw_documentos::class);
    }
}
