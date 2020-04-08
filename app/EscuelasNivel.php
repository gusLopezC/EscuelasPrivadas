<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscuelasNivel extends Model
{
    //
    protected $fillable = [
        'escuela_id',
        'guarderia',
        'preescolar',
        'primarias',
        'secundarias',
        'preparatorias',
        'universidades',
        'otras',
    ];


    public function getEscuela()
    {
        return $this->hasMany('App\Escuelas', 'id', 'escuela_id');
    }
}
