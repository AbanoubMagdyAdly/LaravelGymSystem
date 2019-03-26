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

    public function gym(){
        return $this->belongsTo('App\Gym');
    }
    public function user(){
        return $this->belongsTo('App\Trainee');
    }
    public function session(){
        return $this->belongsTo('App\TrainingSession');
    }
    // public function city(){
    //     return $this->belongsTo('App\City');
    // }
}
