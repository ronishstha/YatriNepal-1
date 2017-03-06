<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\User;

class CountriesController extends Controller
{
    public function getCountry(){
        $countries = Country::orderBy('created_at', 'desc')->paginate(3);

        if(!$countries){
            return redirect()->route('backend.dashboard')->with(['fail' => 'no country found']);
        }
        return view('backend.country.country', ['countries' => $countries]);
    }

    public function getCreateCountry(){
        return view('backend.country.create_country');
    }

    public function postCreateCountry(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'flag'  => 'required',
        ]);
        $slug = $request['title'];
        $country = new Country();
        $country->title = $request['title'];
        $country->flag = $request['flag'];
        $country->slug = str_slug($slug, '-');
        $country->status = $request['status'];
        //--------------------requires changes----------------
        $user = User::first();
        //----------requires changes---------

        $user->countries()->save($country);
        return redirect()->route('backend.country');
    }

    public function getUpdate($country_id){
        $country = Country::findOrFail($country_id);
        return view('backend.country.update_country', ['country' => $country]);
    }

    public function postUpdate(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'flag'  => 'required',
        ]);
        $country = Country::findOrFail($request['country_id']);
        $country->title = $request['title'];
        $country->flag = $request['flag'];
        $country->status = $request['status'];
        //--------------------requires changes----------------

        $user = User::where('id', 2)->first();
        $country->user_id = $user->id;
        //-----------------------------------

        $country->update();
        return redirect()->route('backend.country')->with(['success' => 'successfully updated']);
    }

    public function getDelete($country_id){
        $country = Country::findOrFail($country_id);
        $country->delete();
        return redirect()->route('backend.country');
    }
}
