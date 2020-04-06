<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotosEscuelas extends Model
{
    //

    protected $fillable = [
        'id',
        'photo',
        'escuela_id',
    ];

    public function getPhotos()
    {
        return $this->belongsTo('App\Escuelas', 'escuela_id');
    }

}
