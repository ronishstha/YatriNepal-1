<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Country;
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
            'title' => 'required|unique:countries',
            'flag'  => 'required',
        ]);
        $slug = $request['title'];
        $country = new Country();
        $file = $request->file('flag');
        $uploadPath = storage_path() . '/app/country';
        $fileName = date('Y-m-d-H-i-s') . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);
        $country->flag = $fileName;
        $country->title = $request['title'];
        $country->slug = str_slug($slug, '-');
        $country->status = $request['status'];
        $user = Auth::user();
        $user->countries()->save($country);
        return redirect()->route('backend.country')->with(['success' => 'Successfully created']);
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
        $country->status = $request['status'];
        $user = Auth::user();

        $old = $country->flag;
        $file = $request->file('flag');
        if($request->hasFile('flag')){
            if(!empty($country->flag)){
                unlink(storage_path() . "\\app\\country\\" . $country->flag);
            }
            $uploadPath = storage_path() . '/app/country';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $country->flag = $fileName;
        }else{
            $country->flag = $old;
        }

        $country->user_id = $user->id;
        $country->update();
        return redirect()->route('backend.country')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($country_id){
        $country = Country::findOrFail($country_id);
        unlink(storage_path() . "\\app\\country\\" . $country->flag);
        $country->delete();
        return redirect()->route('backend.country.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($country_id){
        $country = Country::findOrFail($country_id);
        $country->status = "trash";
        $country->update();
        return redirect()->route('backend.country')->with(['success' => 'Successfully moved to trash']);
    }

    public function DeleteForever(){
        $countries = Country::all();
        return view('backend.country.trash_country', ['countries' => $countries ]);
    }

    public function Restore($country_id){
        $country = Country::findorFail($country_id);
        $country->status = "published";
        $country->update();
        return redirect()->route('backend.country');
    }

    public function getImage($filename){
        $file = Storage::disk('country')->get($filename);
        return new Response($file, 200);
    }
}
