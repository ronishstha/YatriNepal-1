<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Affiliate;
use App\User;

class AffiliatesController extends Controller
{
    public function getAffiliate(){
        $affiliates = Affiliate::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.affiliate.affiliate', ['affiliates' => $affiliates]);
    }

    public function getCreateAffiliate(){
        return view('backend.affiliate.create_affiliate');
    }

    public function postCreateAffiliate(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);

        $affiliate = new Affiliate();
        $file = $request->file('image');
        if(!empty($file)){
            $uploadPath = public_path() . '/affiliate';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $affiliate->image = $fileName;
        }

        $slug = $request['title'];
        $affiliate->title = $request['title'];
        $affiliate->link = $request['link'];
        $affiliate->slug = str_slug($slug,'-');
        $affiliate->status = $request['status'];
        $user = Auth::user();
        $user->affiliates()->save($affiliate);
        return redirect()->route('backend.affiliate')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($affiliate_id){
        $affiliate = Affiliate::findorFail($affiliate_id);
        return view('backend.affiliate.update_affiliate', ['affiliate' => $affiliate]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $affiliate = Affiliate::findOrFail($request['affiliate_id']);
        $old = $affiliate->image;
        $file = $request->file('image');
        if($request->hasFile('image')){
            if(!empty($affiliate->image)){
                if (file_exists(public_path() . '/affiliate/' . $affiliate->image)) {
                    unlink(public_path() . '/affiliate/' . $affiliate->image);
                }
            }
            $uploadPath = public_path() . '/affiliate';
            $fileName = date("Y-m-d-H-i-s") . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);
            $affiliate->image = $fileName;
        }else{
            $affiliate->image = $old;
        }
        $slug = $request['title'];
        $affiliate->title = $request['title'];
        $affiliate->link = $request['link'];
        $affiliate->slug = str_slug($slug,'-');
        $affiliate->status = $request['status'];
        $user = Auth::user();
        $affiliate->user_id = $user->id;
        $affiliate->update();
        return redirect()->route('backend.affiliate')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($affiliate_id){
        $affiliate = Affiliate::findOrFail($affiliate_id);
        if(!empty($affiliate->image)){
            if (file_exists(public_path() . '/affiliate/' . $affiliate->image)) {
                unlink(public_path() . '/affiliate/' . $affiliate->image);
            }
        }
        $affiliate->delete();
        return redirect()->route('backend.affiliate.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($affiliate_id){
        $affiliate = Affiliate::findOrFail($affiliate_id);
        $affiliate->status = "trash";
        $affiliate->update();
        return redirect()->route('backend.affiliate')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleAffiliate($affiliate_slug){
        $affiliate = Affiliate::where('slug', $affiliate_slug)
            ->first();
        return view('backend.affiliate.single_affiliate', ['affiliate' => $affiliate]);

    }

    public function DeleteForever(){
        $affiliates = Affiliate::all();
        return view('backend.affiliate.trash_affiliate', ['affiliates' => $affiliates ]);
    }

    public function Restore($affiliate_id){
        $affiliate = Affiliate::findorFail($affiliate_id);
        $affiliate->status = "published";
        $affiliate->update();
        return redirect()->route('backend.affiliate')->with(['success' => 'Item has been restored']);
    }

    public function DeleteAll(){
        $affiliates = Affiliate::where('status', 'trash')->get();
        foreach($affiliates as $affiliate){
            if($affiliate->status = "trash"){
                if(!empty($affiliate->image)){
                    if (file_exists(public_path() . '/affiliate/' . $affiliate->image)) {
                        unlink(public_path() . '/affiliate/' . $affiliate->image);
                    }
                }
                $affiliate->delete();
            }
        }
        return redirect()->route('backend.affiliate.delete.page')->with(['success' => 'Trash Cleared']);
    }

    public function RestoreAll(){
        $affiliates = Affiliate::all();
        foreach($affiliates as $affiliate){
            if($affiliate->status = "trash"){
                $affiliate->status = "published";
                $affiliate->update();
            }
        }
        return redirect()->route('backend.affiliate')->with(['success' => 'All items restored']);
    }
}
