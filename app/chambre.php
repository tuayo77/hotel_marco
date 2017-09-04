<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chambre extends Model
{
    protected $fillable = ['tel_ch','description','id_type_ch','statut'];
}
