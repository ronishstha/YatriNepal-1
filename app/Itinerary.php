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

    public function region(){
        return $this->belongsTo('App\Region');
    }

    public function activity(){
        return $this->belongsTo('App\Activity');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function customizes(){
        return $this->hasMany('App\Customize');
    }

    public function bookings(){
        return $this->hasMany('App\Booking');
    }

    public function bookdetails(){
        return $this->hasMany('App\Bookdetail');
    }

    public function galleries(){
        return $this->hasMany('App\Gallery');
    }
}
