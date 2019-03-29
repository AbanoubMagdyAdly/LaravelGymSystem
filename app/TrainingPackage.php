<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
	
    protected $fillable = [
    	'name',
    	'price',
    	'capacity',
    ];


}
