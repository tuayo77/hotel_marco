<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class occupation extends Model
{
   protected $fillable = ['mode_payement','nbre_pers','nbre_jours','prix','date_debut','date_fin','id_clt','id_ch'];
}
