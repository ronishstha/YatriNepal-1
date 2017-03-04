<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function getPost(){
        return view('backend.post');
    }

    public function getCreatepost(){
        $categories = Category::all();
        return view('backend.create_post', ['categories' => $categories]);
    }

    public function postCreatepost(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'page'  => 'required',
            'content' => 'required',
        ]);
        $category_post = $request['category'];
        $slug = $request['title'];
        $post = new Post();
        $post->title = $request['title'];
        $post->page = $request['page'];
        $post->content = $request['content'];
        $post->slug = str_slug($slug, '-');
        $category = Category::where('name', $category_post)->first();
        $category->posts()->save($post);
        return redirect()->route('backend.dashboard');
    }
}
