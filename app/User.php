<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function pages(){
        return $this->hasMany('App\Page');
    }

    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function banners(){
        return $this->hasMany('App\Banner');
    }

    public function countries(){
        return $this->hasMany('App\Country');
    }

    public function destinations(){
        return $this->hasMany('App\Destination');
    }
}
