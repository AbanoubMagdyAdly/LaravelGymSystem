<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model{
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