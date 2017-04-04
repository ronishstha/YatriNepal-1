<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
            'country' => 'required'
        ]);

        $destination = new Destination();
        $file = $request->file('image');
        if(!empty($file)){
            $uploadPath = public_path() . '/destination';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $destination->image = $fileName;
        }
        $slug = $request['title'];
        $nation = $request['country'];
        $destination->title = $request['title'];
        $destination->description = $request['description'];
        $destination->slug = str_slug($slug,'-');
        $destination->status = $request['status'];
        $user = Auth::user();
        $country = Country::where('title', $nation)->first();
        $destination->user()->associate($user);
        $destination->country()->associate($country);
        $destination->save();

        return redirect()->route('backend.destination')->with(['success' => 'Successfully created']);
    }


    public function getUpdate($destination_id){
        $destination = Destination::findorFail($destination_id);
        $countries = Country::all();
        return view('backend.destination.update_destination', ['destination' => $destination, 'countries' => $countries]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'country' => 'required',
        ]);
        $destination = Destination::findOrFail($request['destination_id']);

        $old = $destination->image;
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(!empty($destination->image)){
                unlink(public_path() . "\\destination\\" . $destination->image);
            }
            $uploadPath = public_path() . '/destination';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $destination->image = $fileName;
        }else{
            $destination->image = $old;
        }
        $slug = $request['title'];
        $nation = $request['country'];
        $destination->title = $request['title'];
        $destination->description = $request['description'];
        $destination->slug = str_slug($slug, '-');
        $destination->status = $request['status'];
        $user = Auth::user();
        $destination->user_id = $user->id;
        $country = Country::where('title', $nation)->first();
        $destination->country_id = $country->id;
        $destination->update();
        return redirect()->route('backend.destination')->with(['success' => 'successfully updated']);
    }

    public function getDelete($destination_id){
        $destination = Destination::findOrFail($destination_id);
        unlink(public_path() . "\\destination\\" . $destination->image);
        $destination->delete();
        return redirect()->route('backend.destination.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($destination_id){
        $destination = Destination::findOrFail($destination_id);
        $destination->status = "trash";
        $destination->update();
        return redirect()->route('backend.destination')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleDestination($destination_slug){
        $destination = Destination::where('slug', $destination_slug)
                                    ->first();
        return view('backend.destination.single_destination', ['destination' => $destination]);
    }

    public function DeleteForever(){
        $destinations = Destination::all();
        return view('backend.destination.trash_destination', ['destinations' => $destinations ]);
    }

    public function Restore($destination_id){
        $destination = Destination::findorFail($destination_id);
        $destination->status = "published";
        $destination->update();
        return redirect()->route('backend.destination');
    }
}
