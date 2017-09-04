<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = ['mode_payement','nbre_pers','date_debut','date_fin','id_clt','id_ch'];
}
