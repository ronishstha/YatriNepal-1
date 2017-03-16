<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function destination(){
        return $this->belongsTo('App\Destination');
    }

    public function region(){
        return $this->belongsTo('App\Region');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }
}
