<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Region;
use App\Destination;
use App\User;

class RegionsController extends Controller
{
    public function getRegion(){
        $regions = Region::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.region.region', ['regions' => $regions]);
    }

    public function getCreateRegion(){
        $destinations = Destination::all();
        return view('backend.region.create_region', ['destinations' => $destinations]);
    }

    public function postCreateRegion(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'destination' => 'required'
        ]);

        $region = new Region();
        $slug = $request['title'];
        $travel = $request['destination'];
        $region->title = $request['title'];
        $region->slug = str_slug($slug,'-');
        $region->status = $request['status'];
        $user = Auth::user();
        $destination = Destination::where('title', $travel)->first();
        $region->user()->associate($user);
        $region->destination()->associate($destination);
        $region->save();

        return redirect()->route('backend.region');
    }

    public function getUpdate($region_id){
        $region = Region::findorFail($region_id);
        $destinations = Destination::all();
        return view('backend.region.update_region', ['region' => $region, 'destinations' => $destinations]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'destination' => 'required',
        ]);
        $region = Region::findOrFail($request['region_id']);
        $slug = $request['title'];
        $travel = $request['destination'];
        $region->title = $request['title'];
        $region->slug = str_slug($slug, '-');
        $region->status = $request['status'];
        $user = Auth::user();
        $region->user_id = $user->id;
        $destination = Destination::where('title', $travel)->first();
        $region->destination_id = $destination->id;
        $region->update();
        return redirect()->route('backend.region')->with(['success' => 'successfully updated']);
    }

    public function getDelete($region_id){
        $region = Region::findOrFail($region_id);
        $region->delete();
        return redirect()->route('backend.region');
    }

    /*public function getSingleRegion($region_slug){
        $region = Region::where('slug', $region_slug)
            ->first();
        return view('backend.region.single_region', ['region' => $region]);

    }*/
}
