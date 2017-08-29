<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = ['nom_clt','date_nais_clt','lieux','nationalite','sexe','pays_resi','telephone','profession','from','to','cni','deliver','transport'];
}
