<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Gallery;
use App\User;
use App\Photo;
use App\Itinerary;

class GalleriesController extends Controller
{
    public function getGallery(){
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.gallery.gallery', ['galleries' => $galleries]);
    }

    public function getCreateGallery(){
        $itineraries = Itinerary::all();
        return view('backend.gallery.create_gallery', ['itineraries' => $itineraries]);
    }

    public function postCreateGallery(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:galleries',
            'itinerary' => 'required'
        ]);

        $gallery = new Gallery();

        $file = $request->file('image');
        if(!empty($file)){
            $uploadPath = public_path() . '/gallery';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $gallery->image = $fileName;
        }



        $slug = $request['title'];
        File::makeDirectory(public_path() . '/gallery/' . $slug, 0775);
        $trip = $request['itinerary'];
        $gallery->title = $request['title'];
        $gallery->slug = str_slug($slug,'-');
        $gallery->status = $request['status'];
        $user = Auth::user();
        $itinerary = Itinerary::where('title', $trip)->first();
        $gallery->user()->associate($user);
        $gallery->itinerary()->associate($itinerary);
        $gallery->save();

        return redirect()->route('backend.gallery')->with(['success' => 'Successfully created']);
    }


    public function getUpdate($gallery_id){
        $gallery = Gallery::findorFail($gallery_id);
        $itineraries = Itinerary::all();
        return view('backend.gallery.update_gallery', ['gallery' => $gallery, 'itineraries' => $itineraries]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'itinerary' => 'required',
        ]);
        $gallery = Gallery::findOrFail($request['gallery_id']);

        $old = $gallery->image;
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(!empty($gallery->image)){
                unlink(public_path() . "\\gallery\\" . $gallery->image);
            }
            $uploadPath = public_path() . '/gallery';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $gallery->image = $fileName;
        }else{
            $gallery->image = $old;
        }
        $trip = $request['itinerary'];
        $gallery->status = $request['status'];
        $user = Auth::user();
        $gallery->user_id = $user->id;
        $itinerary = Itinerary::where('title', $trip)->first();
        $gallery->itinerary_id = $itinerary->id;
        $gallery->update();
        return redirect()->route('backend.gallery')->with(['success' => 'successfully updated']);
    }

    public function getDelete($gallery_id){
        $gallery = Gallery::findOrFail($gallery_id);
        if(!empty($gallery->image)){
            unlink(public_path() . "\\gallery\\" . $gallery->image);
        }
        File::deleteDirectory(public_path() . '/gallery/'. $gallery->title);
        $gallery->delete();
        return redirect()->route('backend.gallery.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($gallery_id){
        $gallery = Gallery::findOrFail($gallery_id);
        $gallery->status = "trash";
        $gallery->update();
        return redirect()->route('backend.gallery')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleGallery($gallery_slug){
        $gallery = Gallery::where('slug', $gallery_slug)
            ->first();
        $photos = Photo::where('gallery_id', $gallery->id)->get();
        return view('backend.gallery.single_gallery', ['gallery' => $gallery, 'photos' => $photos]);
    }

    public function DeleteForever(){
        $galleries = Gallery::all();
        return view('backend.gallery.trash_gallery', ['galleries' => $galleries ]);
    }

    public function Restore($gallery_id){
        $gallery = Gallery::findorFail($gallery_id);
        $gallery->status = "published";
        $gallery->update();
        return redirect()->route('backend.gallery');
    }

}
