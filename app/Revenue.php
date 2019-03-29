<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
    	'trainee_id',
    	'package_id',
        'gym_id',
        'city_id',
        'price',
    ];
}
