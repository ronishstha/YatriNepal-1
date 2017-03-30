<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use App\Country;
use App\Destination;
use App\Region;
use App\Activity;
use App\Category;
use App\Itinerary;
use Illuminate\Support\Facades\Storage;

class ItinerariesController extends Controller
{
    public function getItinerary(){
        $itineraries = Itinerary::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.itinerary.itinerary', ['itineraries' => $itineraries]);
    }

    public function getCreateItinerary(){
        $countries = Country::all();
        $destinations = Destination::all();
        $regions = Region::all();
        $activities = Activity::all();
        $categories = Category::all();
        return view('backend.itinerary.create_itinerary',
                    ['countries'  => $countries,
                     'destinations' => $destinations,
                     'regions' => $regions,
                     'activities' => $activities,
                     'categories' => $categories]);
    }

    public function postCreateItinerary(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'itinerary_code' => 'required|unique:itineraries',
            'trip_duration' => 'required',
            'trekking_duration' => 'required',
            'trekking_grade' => 'required',
            'accommodation' => 'required',
            'meals' => 'required',
            'max_altitude' => 'required',
            'best_time' => 'required',
            'group_size' => 'required',
            'start_end' => 'required',
            'arrival' => 'required',
            'departure' => 'required',
            'cost' => 'required',
            'country' => 'required',
            'destination' => 'required',
            'region' => 'required',
            'activity' => 'required',
            'category' => 'required',
            'summary' => 'required',
            'trip_introduction' => 'required',
            'itinerary' => 'required',
            'important_note' => 'required',
            'cost_inclusive' => 'required',
            'cost_exclusive' => 'required',
            'trekking_group' => 'required'
        ]);

        $itinerary = new Itinerary();
        $file = $request->file('image');
        $uploadPath = storage_path() . '/app/itinerary';
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $file->move($uploadPath, $fileName);
        $itinerary->image = $fileName;

        $file_route = $request->file('route_map');
        $uploadPath = storage_path() . '/app/itinerary';
        $fileName_route = date("Y-m-d-H-i-s") . $file_route->getClientOriginalName();
        $file_route->move($uploadPath, $fileName_route);
        $itinerary->route_map = $fileName_route;

        $slug = $request['title'];
        $nation = $request['country'];
        $travel = $request['destination'];
        $area = $request['region'];
        $action = $request['activity'];
        $class = $request['category'];
        $country = Country::where('title', $nation)->first();
        $destination = Destination::where('title', $travel)->first();
        $region = Region::where('title', $area)->first();
        $activity = Activity::where('title', $action)->first();
        $category = Category::where('title', $class)->first();
        $user = Auth::user();

        $itinerary->title = $request['title'];
        $itinerary->itinerary_code = $request['itinerary_code'];
        $itinerary->trip_duration = $request['trip_duration'];
        $itinerary->trekking_duration = $request['trekking_duration'];
        $itinerary->trekking_grade = $request['trekking_grade'];
        $itinerary->accommodation = $request['accommodation'];
        $itinerary->meals = $request['meals'];
        $itinerary->max_altitude = $request['max_altitude'];
        $itinerary->best_time = $request['best_time'];
        $itinerary->group_size = $request['group_size'];
        $itinerary->start_end = $request['start_end'];
        $itinerary->arrival = $request['arrival'];
        $itinerary->departure = $request['departure'];
        $itinerary->date = $request['date'];
        $itinerary->cost = $request['cost'];
        $itinerary->summary = $request['summary'];
        $itinerary->trip_introduction = $request['trip_introduction'];
        $itinerary->itinerary = $request['itinerary'];
        $itinerary->important_note = $request['important_note'];
        $itinerary->cost_inclusive = $request['cost_inclusive'];
        $itinerary->cost_exclusive = $request['cost_exclusive'];
        $itinerary->trekking_group = $request['trekking_group'];
        $itinerary->trip_status = $request['trip_status'];
        $itinerary->featured = $request['featured'];
        $itinerary->special_package = $request['special_package'];
        $itinerary->best_selling = $request['best_selling'];
        $itinerary->slug = str_slug($slug,'-');
        $itinerary->status = $request['status'];
        $itinerary->user()->associate($user);
        $itinerary->country()->associate($country);
        $itinerary->destination()->associate($destination);
        $itinerary->region()->associate($region);
        $itinerary->activity()->associate($activity);
        $itinerary->category()->associate($category);
        $itinerary->save();

        return redirect()->route('backend.itinerary')->with(['success' => 'Successfully created']);
    }


    public function getUpdate($itinerary_id){
        $countries = Country::all();
        $destinations = Destination::all();
        $regions = Region::all();
        $activities = Activity::all();
        $categories = Category::all();
        $itinerary = Itinerary::findorFail($itinerary_id);
        return view('backend.itinerary.update_itinerary', [
                    'itinerary' => $itinerary,
                    'countries'  => $countries,
                    'destinations' => $destinations,
                    'regions' => $regions,
                    'activities' => $activities,
                    'categories' => $categories]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'trip_duration' => 'required',
            'trekking_duration' => 'required',
            'trekking_grade' => 'required',
            'accommodation' => 'required',
            'meals' => 'required',
            'max_altitude' => 'required',
            'best_time' => 'required',
            'group_size' => 'required',
            'start_end' => 'required',
            'arrival' => 'required',
            'departure' => 'required',
            'cost' => 'required',
            'country' => 'required',
            'destination' => 'required',
            'region' => 'required',
            'activity' => 'required',
            'category' => 'required',
            'summary' => 'required',
            'trip_introduction' => 'required',
            'itinerary' => 'required',
            'important_note' => 'required',
            'cost_inclusive' => 'required',
            'cost_exclusive' => 'required',
            'trekking_group' => 'required'
        ]);
        $itinerary = Itinerary::findOrFail($request['itinerary_id']);
        $old = $itinerary->image;
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(!empty($itinerary->image)){
                unlink(storage_path() . "\\app\\itinerary\\" . $itinerary->image);
            }
            $uploadPath = storage_path() . '/app/itinerary';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $itinerary->image = $fileName;
        }else{
            $itinerary->image = $old;
        }
        $old_route = $itinerary->route_map;
        $file_route = $request->file('route_map');
        if($request->hasFile('route_map')){
            if(!empty($itinerary->route_map)){
                unlink(storage_path() . "\\app\\itinerary\\" . $itinerary->route_map);
            }
            $uploadPath = storage_path() . '/app/itinerary';
            $fileName_route = date("Y-m-d-H-i-s") . $file_route->getClientOriginalName();
            $file_route->move($uploadPath, $fileName_route);
            $itinerary->route_map = $fileName_route;
        }else{
            $itinerary->route_map = $old_route;
        }

        $slug = $request['title'];
        $nation = $request['country'];
        $travel = $request['destination'];
        $area = $request['region'];
        $action = $request['activity'];
        $class = $request['category'];
        $country = Country::where('title', $nation)->first();
        $destination = Destination::where('title', $travel)->first();
        $region = Region::where('title', $area)->first();
        $activity = Activity::where('title', $action)->first();
        $category = Category::where('title', $class)->first();
        $user = Auth::user();

        $itinerary->title = $request['title'];
        $itinerary->trip_duration = $request['trip_duration'];
        $itinerary->trekking_duration = $request['trekking_duration'];
        $itinerary->trekking_grade = $request['trekking_grade'];
        $itinerary->accommodation = $request['accommodation'];
        $itinerary->meals = $request['meals'];
        $itinerary->max_altitude = $request['max_altitude'];
        $itinerary->best_time = $request['best_time'];
        $itinerary->group_size = $request['group_size'];
        $itinerary->start_end = $request['start_end'];
        $itinerary->arrival = $request['arrival'];
        $itinerary->departure = $request['departure'];
        $itinerary->date = $request['date'];
        $itinerary->cost = $request['cost'];
        $itinerary->summary = $request['summary'];
        $itinerary->trip_introduction = $request['trip_introduction'];
        $itinerary->itinerary = $request['itinerary'];
        $itinerary->important_note = $request['important_note'];
        $itinerary->cost_inclusive = $request['cost_inclusive'];
        $itinerary->cost_exclusive = $request['cost_exclusive'];
        $itinerary->trekking_group = $request['trekking_group'];
        $itinerary->trip_status = $request['trip_status'];
        $itinerary->slug = str_slug($slug,'-');
        $itinerary->status = $request['status'];
        $itinerary->country_id = $country->id;
        $itinerary->destination_id = $destination->id;
        $itinerary->region_id = $region->id;
        $itinerary->activity_id = $activity->id;
        $itinerary->category_id = $category->id;
        $itinerary->user_id = $user->id;
        $itinerary->update();
        return redirect()->route('backend.itinerary')->with(['success' => 'successfully updated']);
    }

    public function getDelete($itinerary_id){
        $itinerary = Itinerary::findOrFail($itinerary_id);
        unlink(storage_path() . "\\app\\itinerary\\" . $itinerary->image);
        unlink(storage_path() . "\\app\\itinerary\\" . $itinerary->route_map);
        $itinerary->delete();
        return redirect()->route('backend.itinerary.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($itinerary_id){
        $itinerary = Itinerary::findOrFail($itinerary_id);
        $itinerary->status = "trash";
        $itinerary->update();
        return redirect()->route('backend.itinerary')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleItinerary($itinerary_slug){
        $itinerary = Itinerary::where('slug', $itinerary_slug)
            ->first();
        return view('backend.itinerary.single_itinerary', ['itinerary' => $itinerary]);
    }

    public function DeleteForever(){
        $itineraries = Itinerary::all();
        return view('backend.itinerary.trash_itinerary', ['itineraries' => $itineraries ]);
    }

    public function Restore($itinerary_id){
        $itinerary = Itinerary::findorFail($itinerary_id);
        $itinerary->status = "published";
        $itinerary->update();
        return redirect()->route('backend.itinerary');
    }

    public function getImage($filename){
        $file = Storage::disk('itinerary')->get($filename);
        return new Response($file, 200);
    }

    /*public function getRouteMap($mapname){
        $file = Storage::disk('itinerary')->get($mapname);
        return new Response($file, 200);
    }*/
}
