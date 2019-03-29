<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachesSession extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'gym_id',
        'session_id',
        'coach_id',
    ];

}
