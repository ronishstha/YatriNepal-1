<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customize extends Model
{
    public function itinerary(){
        return $this->belongsTo('App\Itinerary');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
