<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;

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

    public function regions(){
        return $this->hasMany('App\Region');
    }

    public function activities(){
        return $this->hasMany('App\Activity');
    }
}
