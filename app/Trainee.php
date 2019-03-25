<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Trainee extends Authenticatable{
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

];
}