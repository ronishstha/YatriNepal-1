<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Customize;
use App\User;
use App\Itinerary;

class CustomizesController extends Controller
{
    public function getCustomize(){
        $customizes = Customize::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.customize.customize', ['customizes' => $customizes]);
    }

    public function getCreateCustomize(){
        $itineraries = Itinerary::all();
        return view('backend.customize.create_customize', ['itineraries' => $itineraries]);
    }

    public function postCreateCustomize(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'country' => 'required',
            'itinerary' => 'required'
        ]);

        $customize = new Customize();
        $slug = $request['name'];
        $trip = $request['itinerary'];
        $customize->name = $request['name'];
        $customize->email = $request['email'];
        $customize->contact_no = $request['contact_no'];
        $customize->country = $request['country'];
        $customize->description = $request['description'];
        $customize->slug = str_slug($slug,'-');
        $customize->status = $request['status'];
        $user = Auth::user();
        $itinerary = Itinerary::where('title', $trip)->first();
        $customize->user()->associate($user);
        $customize->itinerary()->associate($itinerary);
        $customize->save();

        return redirect()->route('backend.customize')->with(['success' => 'Successfully created']);
    }


    public function getUpdate($customize_id){
        $customize = Customize::findorFail($customize_id);
        $itineraries = Itinerary::all();
        return view('backend.customize.update_customize', ['customize' => $customize, 'itineraries' => $itineraries]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'country' => 'required',
            'itinerary' => 'required',
        ]);
        $customize = Customize::findOrFail($request['customize_id']);
        $slug = $request['title'];
        $trip = $request['itinerary'];
        $customize->title = $request['title'];
        $customize->email = $request['email'];
        $customize->contact_no = $request['contact_no'];
        $customize->country = $request['country'];
        $customize->description = $request['description'];
        $customize->slug = str_slug($slug, '-');
        $customize->status = $request['status'];
        $user = Auth::user();
        $customize->user_id = $user->id;
        $itinerary = Itinerary::where('title', $trip)->first();
        $customize->itinerary_id = $itinerary->id;
        $customize->update();
        return redirect()->route('backend.customize')->with(['success' => 'successfully updated']);
    }

    public function getDelete($customize_id){
        $customize = Customize::findOrFail($customize_id);
        $customize->delete();
        return redirect()->route('backend.customize.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($customize_id){
        $customize = Customize::findOrFail($customize_id);
        $customize->status = "trash";
        $customize->update();
        return redirect()->route('backend.customize')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleCustomize($customize_slug){
        $customize = Customize::where('slug', $customize_slug)
            ->first();
        return view('backend.customize.single_customize', ['customize' => $customize]);
    }

    public function DeleteForever(){
        $customizes = Customize::all();
        return view('backend.customize.trash_customize', ['customizes' => $customizes ]);
    }

    public function Restore($customize_id){
        $customize = Customize::findorFail($customize_id);
        $customize->status = "published";
        $customize->update();
        return redirect()->route('backend.customize');
    }
}
