<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone',
        'Date',
        'Hour',
        'Guests',
        'school_id',
        'visitante_id',
        'receptor_id',
    ];

    public function getEscuela()
    {
        return $this->hasMany('App\Escuelas', 'id', 'school_id')->selectRaw('id, name, slug');
    }
}
