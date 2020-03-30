<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotosComentarios extends Model
{
    //

    protected $fillable = [
        'id',
        'photo',
        'comentario_id',
    ];

    public function getComentario()
    {
        return $this->belongsTo('App\Comentarios', 'comentario_id');
    }

}
