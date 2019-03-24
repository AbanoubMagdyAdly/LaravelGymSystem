<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceUser extends Model
{
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'session_id',
        'gym_id',
        'city_id',
    ];
}
