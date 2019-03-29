<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coache extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'name',
    	'email',
        'date_of_birth',
        'gender',
    ];
}
