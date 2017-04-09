<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Customize;
use App\User;
use Mail;
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
            'itinerary' => 'required',
            'description' => 'required'
        ]);

        $customize = new Customize();
        $slug = $request['name'];
        $trip = $request['itinerary'];
        $name  = $request['name'];
        $email = $request['email'];
        $country = $request['country'];
        $contact_no = $request['contact_no'];
        $description = $request['description'];
        $customize->name = $request['name'];
        $customize->email = $request['email'];
        $customize->contact_no = $request['contact_no'];
        $customize->country = $request['country'];
        $customize->description = $request['description'];
        $customize->slug = str_slug($slug,'-');
        $customize->status = $request['status'];
        $user = Auth::user();
        $itinerary = Itinerary::where('title', $trip)->first();
        $trip_code = $itinerary->code;
        $customize->user()->associate($user);
        $customize->itinerary()->associate($itinerary);
        $customize->save();

        Mail::send('backend.customize.customize_message_user', [
            'trip' => $trip,
            'trip_code' => $trip_code], function($msg) use($name, $email){
            $msg->from('yatrinepalserver@gmail.com', 'Yatri Nepal');
            $msg->to($email, $name);
            $msg->subject('Customized trip message received');
        });

        Mail::send('backend.customize.customize_message_admin', [
            'trip' => $trip,
            'trip_code' => $trip_code,
            'email' => $email,
            'name' => $name,
            'description' => $description,
            'contact_no' => $contact_no,
            'country' => $country], function($msg) use($name, $email){
            $msg->from($email, $name);
            /*yatrinepal email required*/
            $msg->to('stharonish@gmail.com', 'Yatri Nepal');
            $msg->subject('Customized trip message received');
        });

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

    public function DeleteAll(){
        $customizes = Customize::all();
        foreach($customizes as $customize){
            if($customize->status = "trash"){
                $customize->delete();
            }
        }
        return redirect()->route('backend.customize.delete.customize')->with(['success' => 'Trash Cleared']);
    }

    public function RestoreAll(){
        $customizes = Customize::all();
        foreach($customizes as $customize){
            if($customize->status = "trash"){
                $customize->status = "published";
                $customize->update();
            }
        }
        return redirect()->route('backend.customize')->with(['success' => 'All items restored']);
    }
}
