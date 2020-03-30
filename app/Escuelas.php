<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;


class Escuelas extends Model
{
    use Sluggable;
    use Favoriteable;
    //
    protected $fillable = [
        'name',
        'slug',
        'categoria',
        'address',
        'ciudad',
        'pais',
        'coordenadasGoogle',
        'description',
        'phone',
        'website',
        'redsocial',
        'services',
        'verificado',
        'nivelpromo',
        'calification',
        'user_id',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
