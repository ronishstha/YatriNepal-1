<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Review;
use App\Itinerary;

class ReviewsController extends Controller
{
    public function getReview(){
        $reviews = Review::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.review.review', ['reviews' => $reviews]);
    }

    public function getCreateReview(){
        $itineraries = Itinerary::all();
        return view('backend.review.create_review', ['itineraries' => $itineraries]);
    }

    public function postCreateReview(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'itinerary' => 'required'
        ]);

        $review = new Review();
        $file = $request->file('image');
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $review->image = $fileName;
        $slug = $request['name'];
        $trip = $request['itinerary'];
        $review->name = $request['name'];
        $review->meals = $request['meals'];
        $review->accommodation = $request['accommodation'];
        $review->transportation = $request['transportation'];
        $review->staffs = $request['staffs'];
        $review->money_value = $request['money_value'];
        $review->pre_info = $request['pre_info'];
        $review->description = $request['description'];
        $review->slug = str_slug($slug,'-');
        $review->status = $request['status'];
        $user = Auth::user();
        $itinerary = Itinerary::where('title', $trip)->first();
        $review->user()->associate($user);
        $review->itinerary()->associate($itinerary);
        if($file){
            Storage::disk('local')->put($fileName, File::get($file));
        }
        $review->save();

        return redirect()->route('backend.review')->with(['success' => 'Successfully created']);
    }


    public function getUpdate($review_id){
        $review = Review::findorFail($review_id);
        $itineraries = Itinerary::all();
        return view('backend.review.update_review', ['review' => $review, 'itineraries' => $itineraries]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'itinerary' => 'required',
            'description' => 'required'
        ]);
        $review = Review::findOrFail($request['review_id']);
        $file = $request->file('image');
        $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
        $review->image = $fileName;
        $slug = $request['name'];
        $trip = $request['itinerary'];
        $review->name = $request['name'];
        $review->meals = $request['meals'];
        $review->accommodation = $request['accommodation'];
        $review->transportation = $request['transportation'];
        $review->staffs = $request['staffs'];
        $review->money_value = $request['money_value'];
        $review->pre_info = $request['pre_info'];
        $review->description = $request['description'];
        $review->slug = str_slug($slug, '-');
        $review->status = $request['status'];
        $user = Auth::user();
        if($file){
            Storage::disk('local')->put($fileName, File::get($file));
        }
        $review->user_id = $user->id;
        $itinerary = Itinerary::where('title', $trip)->first();
        $review->itinerary_id = $itinerary->id;
        $review->update();
        return redirect()->route('backend.review')->with(['success' => 'successfully updated']);
    }

    public function getDelete($review_id){
        $review = Review::findOrFail($review_id);
        $review->delete();
        return redirect()->route('backend.review.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($review_id){
        $review = Review::findOrFail($review_id);
        $review->status = "trash";
        $review->update();
        return redirect()->route('backend.review')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleReview($review_slug){
        $review = Review::where('slug', $review_slug)
            ->first();
        return view('backend.review.single_review', ['review' => $review]);
    }

    public function DeleteForever(){
        $reviews = Review::all();
        return view('backend.review.trash_review', ['reviews' => $reviews ]);
    }

    public function Restore($review_id){
        $review = Review::findorFail($review_id);
        $review->status = "published";
        $review->update();
        return redirect()->route('backend.review');
    }

    public function getImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
