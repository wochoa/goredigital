<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'idticket','iduser','idoficina','tipoayuda','detalleayuda','prioridad','fecha_resuelto','hora_resuelto','tiempo_transcurrido','Estado_atencion','idsoporte','solucion','created_at','updated_at',
    ];

    protected $primaryKey = 'idticket';
}
