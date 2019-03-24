<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gyms extends Model
{
    protected $fillable=[
        'name',
        'created_at',
        'manger_id',
        'city_id'
    ];
    public function Gyms(){
        return $this->belongsTo(User::class, 'id');

    }
}
