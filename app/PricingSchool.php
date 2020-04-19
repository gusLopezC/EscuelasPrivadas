<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingSchool extends Model
{
    //
    protected $fillable = [
        'id',
        'description',
        'precio',
        'school_id'
    ];

    public function getPrincing()
    {
        return $this->belongsTo('App\Escuelas', 'school_id');
    }

}
