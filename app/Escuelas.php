<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Escuelas extends Model
{
    use Sluggable;
    //
    protected $fillable = [
        'name',
        'slug',
        'categoria',
        'address',
        'ciudad',
        'estado',
        'pais',
        'coordenadasGoogle',
        'description',
        'phone',
        'website',
        'emailcontacto',
        'redsocial',
        'services',
        'verificado',
        'nivelpromo',
        'calification',
        'user_id',
    ];

    public function getNivelEscuela()
    {
        return $this->hasMany('App\EscuelasNivel', 'escuela_id');
    }

    public function getPhotos()
    {
        return $this->hasMany('App\PhotosEscuelas', 'escuela_id');
    }

    public function getUser()
    {
        return $this->hasMany('App\User', 'id', 'user_id')->select(array('id', 'name', 'email','img'));
    }

    public function getComentarios()
    {
        return $this->hasMany('App\Comentarios', 'escuela_id')->selectRaw('escuela_id, count(*) as totalComentarios')
            ->groupBy('escuela_id');
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function favoritos()
    {

        $cid = auth()->guard()->user() != null ? auth()->guard()->user()->id : null;

        return $this->belongsTo(SchoolFavoritos::class, 'id', 'escuela_id')->where('user_id', $cid);
    }

    public function like()
    {

        return $this->favoritos()->selectRaw('escuela_id,count(*) as count')->groupBy('escuela_id');
    }
}
