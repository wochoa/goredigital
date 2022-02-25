<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniones extends Model
{
    //
    protected $primaryKey = 'idreuniones';
    protected $fillable = [
        'idreuniones','tit_reunion','slug_reunion','id_userreunion','id_depereunion',
    ];
}
