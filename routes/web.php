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

Route::get('icon', function(){
    return view('backend.icon');
})->name('backend.icon');

Route::get('notification', function(){
    return view('backend.notification');
})->name('backend.notification');

//----------------------------------pages route---------------------------------
Route::get('pages', [
    'uses' => 'PageController@getPage',
    'as'   => 'backend.pages'
]);

Route::get('pages/create', [
    'uses' => 'PageController@getCreatePage',
    'as'   => 'backend.pages.get.create'
]);

Route::post('pages', [
    'uses' => 'PageController@postPage',
    'as'   => 'backend.pages.post.create'
]);

Route::get('pages/edit/{page_id}', [
   'uses' => 'PageController@getUpdate',
    'as'  => 'backend.pages.get.update'
]);

Route::post('pages/update', [
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
//----------------------end of pages route---------------------------------------

//-----------------------category route---------------------------

Route::get('category', [
    'uses' => 'CategoriesController@getCategory',
    'as'   => 'backend.category'
]);

Route::post('category/create', [
    'uses' => 'CategoriesController@postCategory',
    'as'  => 'backend.category.create'
]);

Route::get('category/edit/{category_id}', [
    'uses' => 'CategoriesController@getUpdate',
    'as'  => 'backend.category.get.update'
]);

Route::post('category/update', [
    'uses' => 'CategoriesController@postUpdate',
    'as' => 'backend.category.post.update'
]);

Route::get('category/delete/{category_id}', [
    'uses' => 'CategoriesController@getDelete',
    'as' => 'backend.category.delete'
]);

Route::get('category/single/{category_slug}', [
    'uses' => 'CategoriesController@getSingleCategory',
    'as'  => 'backend.category.single.category'
]);
//-------------------------end of category route---------------------------------

//--------------------------banner route----------------------------------
Route::get('banner', [
    'uses' => 'BannerController@getBanner',
    'as'   => 'backend.banner'
]);

Route::get('banner/create', [
   'uses' => 'BannerController@getCreateBanner',
    'as'  => 'backend.banner.get.create'
]);

Route::post('banner/create', [
    'uses' => 'BannerController@postCreateBanner',
    'as'   => 'backend.banner.post.create'
]);

Route::get('banner/edit/{banner_id}', [
    'uses' => 'BannerController@getUpdate',
    'as'   => 'backend.banner.get.update'
]);

Route::post('banner/update', [
    'uses' => 'BannerController@postUpdate',
    'as'   => 'backend.banner.post.update'
]);

Route::get('banner/delete/{banner_id}', [
    'uses' => 'BannerController@getDelete',
    'as'   => 'backend.banner.delete'
]);

Route::get('banner/single/{banner_id}', [
    'uses' => 'BannerController@getSingleBanner',
    'as'   => 'backend.banner.single.banner'
]);
//----------------------end of banner route---------------------

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




