<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolFavoritos extends Model
{
    //
    protected $fillable = [
        'id',
        'escuela_id',
        'user_id',
    ];

    public function escuela(){

        return $this->belongsTo(Escuelas::class)->select(array('id','name','slug','address','calification'));
    }

    public function getEscuela()
    {
        return $this->hasMany('App\Escuelas', 'id', 'escuela_id')->select(array('id','name','slug','address','calification'));
    }


}
