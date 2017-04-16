<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function activities(){
        return $this->hasMany('App\Activity');
    }

    public function itineraries(){
        return $this->hasMany('App\Itinerary');
    }
}
