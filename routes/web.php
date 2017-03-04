<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.dashboard');
})->name('backend.dashboard');

Route::get('user', function(){
    return view('backend.user');
})->name('backend.user');

Route::get('pages', [
    'uses' => 'PageController@getPage',
    'as'   => 'backend.pages'
]);

Route::get('icon', function(){
    return view('backend.icon');
})->name('backend.icon');

Route::get('notification', function(){
    return view('backend.notification');
})->name('backend.notification');

Route::get('create', function(){
    return view('backend.create');
})->name('backend.pages.get.create');

Route::post('pages', [
    'uses' => 'PageController@postPage',
    'as'   => 'backend.pages.post.create'
]);

Route::get('pages/edit/{page_id}', [
   'uses' => 'PageController@getUpdate',
    'as'  => 'backend.pages.get.update'
]);

Route::post('update', [
    'uses' => 'PageController@postUpdate',
    'as' => 'backend.pages.post.update'
]);

Route::get('pages/delete/{page_id}', [
    'uses' => 'PageController@getDelete',
    'as' => 'backend.pages.delete'
]);

Route::get('pages/single/{page_slug}', [
   'uses' => 'PageController@getSinglePage',
    'as'  => 'backend.pages.single.page'
]);

Route::get('post', [
   'uses' => 'PostsController@getPost',
    'as' => 'backend.post'
]);

Route::get('post/create', [
   'uses' => 'PostsController@getCreatePost',
    'as'  => 'backend.create.post'
]);

Route::post('post/create_post',[
    'uses' => 'PostsController@postCreatePost',
    'as'   => 'backend.create.posts'
]);

Route::get('category', [
    'uses' => 'CategoriesController@getCategory',
    'as'   => 'backend.category'
]);

Route::post('category/create', [
   'uses' => 'CategoriesController@postCategory',
    'as'  => 'backend.create.category'
]);


