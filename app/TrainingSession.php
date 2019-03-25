<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id','name', 'user_id', 'session_id' ,'gym_id', 'city_id'
    ];


}
