<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'start_time',
        'finish_time',
        'date_of_session',
        'gym_id'
    ];

    public function Gym() {

        return $this->belongsTo('Gym');
    
    }
}
