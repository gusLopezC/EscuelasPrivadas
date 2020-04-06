<?php


namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','img', 'biografy', 'telephone', 'role', 'verified', 'verification_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const USUARIO_VERIFICADO = true;

    public function esVerificado()
    {
        return $this->verified == User::USUARIO_VERIFICADO;
    }

    public static function generarToken()
    {
        return Str::random(40);
    }
    public function getAvatarUrl()
    {
        if ($this->photo_extension)
            return asset('images/users/' . $this->id . '.' . $this->photo_extension);

        return asset('images/users/default.jpg');
    }
}
