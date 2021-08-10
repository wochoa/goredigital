<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'id','id_enviador','id_receptor','body','created_at','update_at',
    ];
}
