<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function getCategory(){
        $categories = Category::all();
        return view('backend.category', ['categories' => $categories]);
    }

    public function postCategory(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        $pages = new Category();
        $slug = $request['name'];
        $pages->name = $request['name'];
        $pages->slug = str_slug($slug,'-');
        $pages->save();
        return redirect()->route('backend.category');
    }
}
