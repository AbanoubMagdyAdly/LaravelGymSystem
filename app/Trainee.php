<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Trainee extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
    'id',
    'name',
    'email',
    'gender',
    'date_of_birth',
    'password',
    'password_confirmation',
    'image',
    'last_login',

];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
       public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email_address;
    }
}
