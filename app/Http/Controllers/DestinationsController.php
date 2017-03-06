<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;
use App\User;
use App\Country;

class DestinationsController extends Controller
{
    public function getDestination(){
        $destinations = Destination::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.destination.destination', ['destinations' => $destinations]);
    }

    public function getCreateDestination(){
        $countries = Country::all();
        return view('backend.destination.create_destination', ['countries' => $countries]);
    }

    public function postCreateDestination(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'country' => 'required'
        ]);

        $destination = new Destination();
        $slug = $request['title'];
        $nation = $request['country'];
        $destination->title = $request['title'];
        $destination->image = $request['image'];
        $destination->description = $request['description'];
        $destination->slug = str_slug($slug,'-');
        $destination->status = $request['status'];
        //--------------------requires changes----------------
        $user = User::first();

        //-------------------------------
        $country = Country::where('title', $nation)->first();
        $destination->user()->associate($user);
        $destination->country()->associate($country);
        $destination->save();

        return redirect()->route('backend.destination');
    }

    public function getUpdate($destination_id){
        $destination = Destination::findorFail($destination_id);
        return view('backend.destination.update_destination', ['destination' => $destination]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'country' => 'required',
            'description' => 'required'
        ]);
        $destination = Destination::findOrFail($request['destination_id']);
        $slug = $request['title'];
        $nation = $request['country'];
        $destination->title = $request['title'];
        $destination->image = $request['image'];
        $destination->country = $request['country'];
        $destination->description = $request['description'];
        $destination->slug = str_slug($slug, '-');
        $destination->status = $request['status'];
        //-----requires changes-------

        $user = User::where('id', 2)->first();
        $destination->user_id = $user->id;

        //-------------------------------
        $country = Country::where('title', $nation);
        $destination->country_id = $country->id;
        $destination->update();
        return redirect()->route('backend.destination')->with(['success' => 'successfully updated']);
    }

        public function getDelete($destination_id){
            $destination = Destination::findOrFail($destination_id);
            $destination->delete();
            return redirect()->route('backend.destination');
        }

    public function getSingleDestination($destination_slug){
        $destination = Destination::where('slug', $destination_slug)
                                    ->first();
        return view('backend.destination.single_destination', ['destination' => $destination]);

    }
}
