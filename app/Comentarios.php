<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    //
    protected $fillable = [
        'comentario',
        'calification',
        'calificationutil',
        'escuela_id',
        'user_id',
    ];


    public function getPhotosComentario()
    {
        return $this->hasMany('App\PhotosComentarios', 'comentario_id');
    }


    public function getUser()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
}
