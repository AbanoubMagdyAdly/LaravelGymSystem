<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
	public $timestamps = false;
	
    protected $fillable = [
    	'name',
    	'price',
    	'capacity',
    ];
}
