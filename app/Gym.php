<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'name',
        'created_at',
        'manager_id',
        'city_id'
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function TrainingSession()
    {

        return $this->hasMany('TrainingSession');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
