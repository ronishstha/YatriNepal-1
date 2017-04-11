<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;

class CategoriesController extends Controller
{
    public function getCategory(){
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.category.category', ['categories' => $categories]);
    }

    public function postCategory(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
        $category = new Category();

        $category->description = $request['description'];
        $slug = $request['title'];
        $category->title = $request['title'];
        $category->slug = str_slug($slug,'-');
        $category->status = $request['status'];
        $user = Auth::user();
        $user->categories()->save($category);
        return redirect()->route('backend.category')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($category_id){
        $category = Category::findOrFail($category_id);
        return view('backend.category.update_category', ['category' => $category]);
    }

    public function postUpdate(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
        $category = Category::findorFail($request['category_id']);
        $category->title = $request['title'];
        $slug = $request['title'];
        $category->title = $request['title'];
        $category->slug = str_slug($slug,'-');
        $category->description = $request['description'];
        $category->status = $request['status'];
        $user = Auth::user();
        $category->user_id = $user->id;
        $category->update();
        return redirect()->route('backend.category')->with(['success' => 'Successfully updated']);
    }

    public function getDelete($category_id){
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->route('backend.category.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($category_id){
        $category = Category::findOrFail($category_id);
        $category->status = "trash";
        $category->update();
        return redirect()->route('backend.category')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleCategory($category_slug){
        $category = Category::where('slug',$category_slug)
                    ->first();
        return view('backend.category.single_category', ['category' => $category]);
    }

    public function DeleteForever(){
        $categories = Category::all();
        return view('backend.category.trash_category', ['categories' => $categories ]);
    }

    public function Restore($category_id){
        $category = Category::findorFail($category_id);
        $category->status = "published";
        $category->update();
        return redirect()->route('backend.category')->with(['success' => 'Item has been restored']);
    }

    public function DeleteAll(){
        $categories = Category::where('status', 'trash')->get();
        foreach($categories as $category){
            if($category->status = "trash"){
                $category->delete();
            }
        }
        return redirect()->route('backend.category.delete.page')->with(['success' => 'Trash Cleared']);
    }

    public function RestoreAll(){
        $categories = Category::all();
        foreach($categories as $category){
            if($category->status = "trash"){
                $category->status = "published";
                $category->update();
            }
        }
        return redirect()->route('backend.category')->with(['success' => 'All items restored']);
    }
}
