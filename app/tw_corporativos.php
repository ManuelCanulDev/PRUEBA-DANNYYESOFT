<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tw_corporativos extends Model
{
    use SoftDeletes;

    public function tw_empresas_corporativo()
    {
        return $this->hasMany(tw_empresas_corporativos::class);
    }

    public function tw_contactos_corporativos()
    {
        return $this->hasMany(tw_contactos_corporativos::class);
    }

    public function tw_contratos_corporativos()
    {
        return $this->hasMany(tw_contratos_corporativos::class);
    }

    public function tw_documentos_corporativos()
    {
        return $this->hasMany(tw_documentos_corporativos::class);
    }
}
