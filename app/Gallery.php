<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function itinerary(){
        return $this->belongsTo('App\Itinerary');
    }

    public function photo(){
        return $this->hasMany('App\Photo');
    }
}
