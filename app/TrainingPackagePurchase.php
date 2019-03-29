<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingPackagePurchase extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	'trainee_id',
    	'package_id',
        'gym_id',
        'city_id',
        'price',
        'created_at'
    ];
    public function gym(){
        return $this->belongsTo('App\Gym');
    }
    public function trainee(){
        return $this->belongsTo('App\Trainee');
    }
    public function trainingpackage(){
        return $this->belongsTo('App\TrainingPackage');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
}
