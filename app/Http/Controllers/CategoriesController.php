<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'description' => 'required'
        ]);
        $category = new Category();

        $category->description = $request['description'];
        $slug = $request['title'];
        $category->title = $request['title'];
        $category->slug = str_slug($slug,'-');
        $category->status = $request['status'];
        //--------------------requires changes----------------

        $user = User::first();
        //------------------------------------------

        $user->categories()->save($category);
        return redirect()->route('backend.category');
    }

    public function getUpdate($category_id){
        $category = Category::findOrFail($category_id);
        return view('backend.category.update_category', ['category' => $category]);
    }

    public function postUpdate(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $category = Category::findorFail($request['category_id']);
        $category->title = $request['title'];
        $slug = $request['title'];
        $category->title = $request['title'];
        $category->slug = str_slug($slug,'-');
        $category->description = $request['description'];
        $category->status = $request['status'];

        //--------------------requires changes----------------

        $user = User::where('id', 2)->first();
        $category->user_id = $user->id;
        //-----------------------------------

        $category->update();
        return redirect()->route('backend.category')->with(['success' => 'successfully updated']);
    }

    public function getDelete($category_id){
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->route('backend.category');
    }

    public function getSingleCategory($category_slug){
        $category = Category::where('slug',$category_slug)
                    ->first();
        return view('backend.category.single_category', ['category' => $category]);
    }
}
