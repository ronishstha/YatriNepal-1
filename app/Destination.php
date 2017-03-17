<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function regions(){
        return $this->hasMany('App\Region');
    }

    public function itineraries(){
        return $this->hasMany('App\Itinerary');
    }
}
