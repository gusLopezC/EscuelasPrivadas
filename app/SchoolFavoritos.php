<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolFavoritos extends Model
{
    //
    protected $fillable = [
        'escuela_id',
        'user_id',
    ];

    public function escuela(){

        return $this->belongsTo(Escuelas::class)->select(array('id','name','slug','address','calification'));
    }
}
