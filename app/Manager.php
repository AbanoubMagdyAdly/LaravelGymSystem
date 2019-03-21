<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manger extends Model
{
    protected $fillable = [
        'user_name',
        'password',
        'email',
        'national_id',
        'image',
        'role'
    ];
}
