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
        return $this->hasMany('App\User', 'id', 'user_id')->selectRaw('id, name, img');
    }

    public function getEscuela()
    {
        return $this->hasMany('App\Escuelas', 'id', 'escuela_id')->selectRaw('id, name, slug');
    }


    public function getPhotosEscuela()
    {
        return $this->hasMany('App\PhotosEscuelas', 'id', 'escuela_id')->selectRaw('id, photo');
    }
}
