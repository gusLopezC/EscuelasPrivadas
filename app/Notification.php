<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Notification extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['type', 'mensaje','user_id'];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at'];
}
