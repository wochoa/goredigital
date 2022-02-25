<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunionesdetalles extends Model
{
    //
    protected $primaryKey = 'id_detareuniones';

    protected $fillable = [
        'id_detareuniones','id_reuniones','iduser','iddependencia','nombres','dni','celular','cargo','email','preguntaincluida',
    ];
}
