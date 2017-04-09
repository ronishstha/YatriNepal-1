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


//----------------------------------frontend admin login------------------------------------------------
Route::get('/', function(){
    return view('frontend.index');
})->name('frontend.index');

Route::get('login', [
    'uses' => 'UserController@getLogin',
    'as'   => 'admin.login.get'
]);

Route::post('login', [
   'uses' => 'UserController@postLogin',
    'as'  => 'admin.login.post'
]);
//------------------------------------end of frontend admin login------------------------------------------


//-------------------------------------------------------------------------------------
//---------------------------------ADMIN MIDDLEWARE------------------------------------
//-------------------------------------------------------------------------------------

Route::group(['prefix' => 'admin',
            'middleware' => 'auth'], function() {

    Route::get('/', [
        'uses' => 'DashboardsController@getDashboard',
        'as'   => 'backend.dashboard'
    ]);

    Route::get('/change-password', function () {
        return view('backend.change_password');
    })->name('backend.changepassword');

    Route::post('/change-password/update', [
        'uses' => 'UserController@changePassword',
        'as'   => 'backend.update.password'
    ]);

//----------------------------------pages route---------------------------------------
    Route::get('pages', [
        'uses' => 'PageController@getPage',
        'as' => 'backend.pages'
    ]);

    Route::get('pages/create', [
        'uses' => 'PageController@getCreatePage',
        'as' => 'backend.pages.get.create'
    ]);

    Route::post('pages', [
        'uses' => 'PageController@postPage',
        'as' => 'backend.pages.post.create'
    ]);

    Route::get('pages/edit/{page_id}', [
        'uses' => 'PageController@getUpdate',
        'as' => 'backend.pages.get.update'
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
        'as' => 'backend.pages.single.page'
    ]);

    Route::get('page/trash/{page_id}', [
        'uses' => 'PageController@getTrash',
        'as'  => 'backend.pages.trash'
    ]);

    Route::get('pages/trash', [
        'uses' => 'PageController@DeleteForever',
        'as'   => 'backend.pages.delete.page'
    ]);

    Route::get('pages/restore/{page_id}', [
        'uses' => 'PageController@Restore',
        'as'   => 'backend.pages.restore'
    ]);

    Route::get('pages/deleteall', [
        'uses' => 'PageController@DeleteAll',
        'as'   => 'backend.pages.delete.all'
    ]);

    Route::get('pages/restoreall', [
        'uses' => 'PageController@RestoreAll',
        'as'   => 'backend.pages.restore.all'
    ]);

//----------------------end of pages route---------------------------------------

//-----------------------category route---------------------------

    Route::get('category', [
        'uses' => 'CategoriesController@getCategory',
        'as' => 'backend.category'
    ]);

    Route::post('category/create', [
        'uses' => 'CategoriesController@postCategory',
        'as' => 'backend.category.create'
    ]);

    Route::get('category/edit/{category_id}', [
        'uses' => 'CategoriesController@getUpdate',
        'as' => 'backend.category.get.update'
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
        'as' => 'backend.category.single.category'
    ]);

    Route::get('category/trash/{category_id}', [
        'uses' => 'CategoriesController@getTrash',
        'as'  => 'backend.category.trash'
    ]);

    Route::get('category/trash', [
        'uses' => 'CategoriesController@DeleteForever',
        'as'   => 'backend.category.delete.page'
    ]);

    Route::get('category/restore/{category_id}', [
        'uses' => 'CategoriesController@Restore',
        'as'   => 'backend.category.restore'
    ]);

    Route::get('category/deleteall', [
        'uses' => 'CategoriesController@DeleteAll',
        'as'   => 'backend.category.delete.all'
    ]);

    Route::get('category/restoreall', [
        'uses' => 'CategoriesController@RestoreAll',
        'as'   => 'backend.category.restore.all'
    ]);

//-------------------------end of category route---------------------------------

//--------------------------banner route----------------------------------
    Route::get('banner', [
        'uses' => 'BannerController@getBanner',
        'as' => 'backend.banner'
    ]);

    Route::get('banner/create', [
        'uses' => 'BannerController@getCreateBanner',
        'as' => 'backend.banner.get.create'
    ]);

    Route::post('banner/create', [
        'uses' => 'BannerController@postCreateBanner',
        'as' => 'backend.banner.post.create'
    ]);

    Route::get('banner/edit/{banner_id}', [
        'uses' => 'BannerController@getUpdate',
        'as' => 'backend.banner.get.update'
    ]);

    Route::post('banner/update', [
        'uses' => 'BannerController@postUpdate',
        'as' => 'backend.banner.post.update'
    ]);

    Route::get('banner/delete/{banner_id}', [
        'uses' => 'BannerController@getDelete',
        'as' => 'backend.banner.delete'
    ]);

    Route::get('banner/single/{banner_slug}', [
        'uses' => 'BannerController@getSingleBanner',
        'as' => 'backend.banner.single.banner'
    ]);

    Route::get('banner/trash/{banner_id}', [
        'uses' => 'BannerController@getTrash',
        'as'  => 'backend.banner.trash'
    ]);

    Route::get('banner/trash', [
        'uses' => 'BannerController@DeleteForever',
        'as'   => 'backend.banner.delete.page'
    ]);

    Route::get('banner/restore/{banner_id}', [
        'uses' => 'BannerController@Restore',
        'as'   => 'backend.banner.restore'
    ]);

    Route::get('banner/deleteall', [
        'uses' => 'BannerController@DeleteAll',
        'as'   => 'backend.banner.delete.all'
    ]);

    Route::get('banner/restoreall', [
        'uses' => 'BannerController@RestoreAll',
        'as'   => 'backend.banner.restore.all'
    ]);

//----------------------end of banner route---------------------


//---------------------------country route------------------------

    Route::get('country', [
        'uses' => 'CountriesController@getCountry',
        'as' => 'backend.country'
    ]);

    Route::get('country/create', [
        'uses' => 'CountriesController@getCreateCountry',
        'as' => 'backend.country.get.create'
    ]);

    Route::post('country/create', [
        'uses' => 'CountriesController@postCreateCountry',
        'as' => 'backend.country.post.create'
    ]);

    Route::get('country/edit/{country_id}', [
        'uses' => 'CountriesController@getUpdate',
        'as' => 'backend.country.get.update'
    ]);

    Route::post('country/update', [
        'uses' => 'CountriesController@postUpdate',
        'as' => 'backend.country.post.update'
    ]);

    Route::get('country/delete/{country_id}', [
        'uses' => 'CountriesController@getDelete',
        'as' => 'backend.country.delete'
    ]);

    Route::get('country/trash/{country_id}', [
        'uses' => 'CountriesController@getTrash',
        'as'  => 'backend.country.trash'
    ]);

    Route::get('country/trash', [
        'uses' => 'CountriesController@DeleteForever',
        'as'   => 'backend.country.delete.page'
    ]);

    Route::get('country/restore/{country_id}', [
        'uses' => 'CountriesController@Restore',
        'as'   => 'backend.country.restore'
    ]);

    Route::get('country/deleteall', [
        'uses' => 'CountriesController@DeleteAll',
        'as'   => 'backend.country.delete.all'
    ]);

    Route::get('country/restoreall', [
        'uses' => 'CountriesController@RestoreAll',
        'as'   => 'backend.country.restore.all'
    ]);


//--------------------------end of country route----------------------------

//-----------------------Destination route---------------------------

    Route::get('destination', [
        'uses' => 'DestinationsController@getDestination',
        'as' => 'backend.destination'
    ]);

    Route::get('destination/create', [
        'uses' => 'DestinationsController@getCreateDestination',
        'as' => 'backend.destination.get.create'
    ]);

    Route::post('destination/create', [
        'uses' => 'DestinationsController@postCreateDestination',
        'as' => 'backend.destination.post.create'
    ]);

    Route::get('destination/edit/{destination_id}', [
        'uses' => 'DestinationsController@getUpdate',
        'as' => 'backend.destination.get.update'
    ]);

    Route::post('destination/update', [
        'uses' => 'DestinationsController@postUpdate',
        'as' => 'backend.destination.post.update'
    ]);

    Route::get('destination/delete/{destination_id}', [
        'uses' => 'DestinationsController@getDelete',
        'as' => 'backend.destination.delete'
    ]);

    Route::get('destination/single/{category_slug}', [
        'uses' => 'DestinationsController@getSingleDestination',
        'as' => 'backend.destination.single.destination'
    ]);

    Route::get('destination/trash/{destination_id}', [
        'uses' => 'DestinationsController@getTrash',
        'as'  => 'backend.destination.trash'
    ]);

    Route::get('destination/trash', [
        'uses' => 'DestinationsController@DeleteForever',
        'as'   => 'backend.destination.delete.page'
    ]);

    Route::get('destination/restore/{destination_id}', [
        'uses' => 'DestinationsController@Restore',
        'as'   => 'backend.destination.restore'
    ]);

    Route::get('destination/deleteall', [
        'uses' => 'DestinationsController@DeleteAll',
        'as'   => 'backend.destination.delete.all'
    ]);

    Route::get('destination/restoreall', [
        'uses' => 'DestinationsController@RestoreAll',
        'as'   => 'backend.destination.restore.all'
    ]);

//-------------------------end of destination route---------------------------------

//-----------------------Region route---------------------------

    Route::get('region', [
        'uses' => 'RegionsController@getRegion',
        'as' => 'backend.region'
    ]);

    Route::get('region/create', [
        'uses' => 'RegionsController@getCreateRegion',
        'as' => 'backend.region.get.create'
    ]);

    Route::post('region/create', [
        'uses' => 'RegionsController@postCreateRegion',
        'as' => 'backend.region.post.create'
    ]);

    Route::get('region/edit/{region_slug}', [
        'uses' => 'RegionsController@getUpdate',
        'as' => 'backend.region.get.update'
    ]);

    Route::post('region/update', [
        'uses' => 'RegionsController@postUpdate',
        'as' => 'backend.region.post.update'
    ]);

    Route::get('region/delete/{region_id}', [
        'uses' => 'RegionsController@getDelete',
        'as' => 'backend.region.delete'
    ]);

    Route::get('region/trash/{region_id}', [
       'uses' => 'RegionsController@getTrash',
        'as'  => 'backend.region.trash'
    ]);

    Route::get('region/trash', [
        'uses' => 'RegionsController@DeleteForever',
        'as'   => 'backend.region.delete.page'
    ]);

    Route::get('region/restore/{region_id}', [
        'uses' => 'RegionsController@Restore',
        'as'   => 'backend.region.restore'
    ]);

    Route::get('region/deleteall', [
        'uses' => 'RegionsController@DeleteAll',
        'as'   => 'backend.region.delete.all'
    ]);

    Route::get('region/restoreall', [
        'uses' => 'RegionsController@RestoreAll',
        'as'   => 'backend.region.restore.all'
    ]);


//-------------------------end of region route---------------------------------

//-----------------------Activity route---------------------------

    Route::get('activity', [
        'uses' => 'ActivitiesController@getActivity',
        'as' => 'backend.activity'
    ]);

    Route::get('activity/create', [
        'uses' => 'ActivitiesController@getCreateActivity',
        'as' => 'backend.activity.get.create'
    ]);

    Route::post('activity/create', [
        'uses' => 'ActivitiesController@postCreateActivity',
        'as' => 'backend.activity.post.create'
    ]);

    Route::get('activity/edit/{activity_id}', [
        'uses' => 'ActivitiesController@getUpdate',
        'as' => 'backend.activity.get.update'
    ]);

    Route::post('activity/update', [
        'uses' => 'ActivitiesController@postUpdate',
        'as' => 'backend.activity.post.update'
    ]);

    Route::get('activity/delete/{activity_id}', [
        'uses' => 'ActivitiesController@getDelete',
        'as' => 'backend.activity.delete'
    ]);

    Route::get('activity/trash/{activity_id}', [
        'uses' => 'ActivitiesController@getTrash',
        'as'  => 'backend.activity.trash'
    ]);

    Route::get('activity/trash', [
        'uses' => 'ActivitiesController@DeleteForever',
        'as'   => 'backend.activity.delete.page'
    ]);

    Route::get('activity/restore/{activity_id}', [
        'uses' => 'ActivitiesController@Restore',
        'as'   => 'backend.activity.restore'
    ]);

    Route::get('activity/deleteall', [
        'uses' => 'ActivitiesController@DeleteAll',
        'as'   => 'backend.activity.delete.all'
    ]);

    Route::get('activity/restoreall', [
        'uses' => 'ActivitiesController@RestoreAll',
        'as'   => 'backend.activity.restore.all'
    ]);

//-------------------------end of activity route---------------------------------

//-------------------------Itinerary route---------------------------------------
    Route::get('itinerary', [
        'uses' => 'ItinerariesController@getItinerary',
        'as' => 'backend.itinerary'
    ]);

    Route::get('itinerary/create', [
        'uses' => 'ItinerariesController@getCreateItinerary',
        'as' => 'backend.itinerary.get.create'
    ]);

    Route::post('itinerary/create', [
        'uses' => 'ItinerariesController@postCreateItinerary',
        'as' => 'backend.itinerary.post.create'
    ]);

    Route::get('itinerary/edit/{itinerary_id}', [
        'uses' => 'ItinerariesController@getUpdate',
        'as' => 'backend.itinerary.get.update'
    ]);

    Route::post('itinerary/update', [
        'uses' => 'ItinerariesController@postUpdate',
        'as' => 'backend.itinerary.post.update'
    ]);

    Route::get('itinerary/delete/{itinerary_id}', [
        'uses' => 'ItinerariesController@getDelete',
        'as' => 'backend.itinerary.delete'
    ]);

    Route::get('itinerary/single/{itinerary_slug}', [
        'uses' => 'ItinerariesController@getSingleItinerary',
        'as' => 'backend.itinerary.single.itinerary'
    ]);

    Route::get('itinerary/trash/{itinerary_id}', [
        'uses' => 'ItinerariesController@getTrash',
        'as'  => 'backend.itinerary.trash'
    ]);

    Route::get('itinerary/trash', [
        'uses' => 'ItinerariesController@DeleteForever',
        'as'   => 'backend.itinerary.delete.page'
    ]);

    Route::get('itinerary/restore/{itinerary_id}', [
        'uses' => 'ItinerariesController@Restore',
        'as'   => 'backend.itinerary.restore'
    ]);

    Route::get('/findDestinationName','ItinerariesController@findDestinationName');

    Route::get('/findRegionName','ItinerariesController@findRegionName');

    Route::get('/findActivityName','ItinerariesController@findActivityName');

    Route::get('itinerary/deleteall', [
        'uses' => 'ItinerariesController@DeleteAll',
        'as'   => 'backend.itinerary.delete.all'
    ]);

    Route::get('itinerary/restoreall', [
        'uses' => 'ItinerariesController@RestoreAll',
        'as'   => 'backend.itinerary.restore.all'
    ]);

//-------------------------end of itinerary route--------------------------------

//-----------------------Review route---------------------------

    Route::get('review', [
        'uses' => 'ReviewsController@getReview',
        'as' => 'backend.review'
    ]);

    Route::get('review/create', [
        'uses' => 'ReviewsController@getCreateReview',
        'as' => 'backend.review.get.create'
    ]);

    Route::post('review/create', [
        'uses' => 'ReviewsController@postCreateReview',
        'as' => 'backend.review.post.create'
    ]);

    Route::get('review/edit/{review_id}', [
        'uses' => 'ReviewsController@getUpdate',
        'as' => 'backend.review.get.update'
    ]);

    Route::post('review/update', [
        'uses' => 'ReviewsController@postUpdate',
        'as' => 'backend.review.post.update'
    ]);

    Route::get('review/delete/{review_id}', [
        'uses' => 'ReviewsController@getDelete',
        'as' => 'backend.review.delete'
    ]);

    Route::get('review/single/{review_slug}', [
        'uses' => 'ReviewsController@getSingleReview',
        'as' => 'backend.review.single.review'
    ]);

    Route::get('review/trash/{review_id}', [
        'uses' => 'ReviewsController@getTrash',
        'as'  => 'backend.review.trash'
    ]);

    Route::get('review/trash', [
        'uses' => 'ReviewsController@DeleteForever',
        'as'   => 'backend.review.delete.page'
    ]);

    Route::get('review/restore/{review_id}', [
        'uses' => 'ReviewsController@Restore',
        'as'   => 'backend.review.restore'
    ]);

    Route::get('review/deleteall', [
        'uses' => 'ReviewsController@DeleteAll',
        'as'   => 'backend.review.delete.all'
    ]);

    Route::get('review/restoreall', [
        'uses' => 'ReviewsController@RestoreAll',
        'as'   => 'backend.review.restore.all'
    ]);

//-------------------------end of review route---------------------------------

//-----------------------Booking route---------------------------

    Route::get('booking', [
        'uses' => 'BookingsController@getBooking',
        'as' => 'backend.booking'
    ]);

    Route::get('booking/step1', [
        'uses' => 'BookingsController@getFirstBooking',
        'as' => 'backend.booking.get.firstcreate'
    ]);


    Route::post('booking/step1', [
        'uses' => 'BookingsController@postFirstBooking',
        'as' => 'backend.booking.post.firstcreate'
    ]);

    Route::get('booking/step2/{itinerar}/{numbe}/{dat}', [
        'uses' => 'BookingsController@getCreateBooking',
        'as' => 'backend.booking.get.create'
    ]);

    Route::post('booking/step3', [
        'uses' => 'BookingsController@postCreateBooking',
        'as' => 'backend.booking.post.create'
    ]);


    Route::get('booking/edit/{booking_id}', [
        'uses' => 'BookingsController@getUpdate',
        'as' => 'backend.booking.get.update'
    ]);

    Route::post('booking/update', [
        'uses' => 'BookingsController@postUpdate',
        'as' => 'backend.booking.post.update'
    ]);

    Route::get('booking/delete/{booking_id}', [
        'uses' => 'BookingsController@getDelete',
        'as' => 'backend.booking.delete'
    ]);

    Route::get('booking/single/{booking_slug}', [
        'uses' => 'BookingsController@getSingleBooking',
        'as' => 'backend.booking.single.booking'
    ]);

    Route::get('booking/trash/{booking_id}', [
        'uses' => 'BookingsController@getTrash',
        'as'  => 'backend.booking.trash'
    ]);

    Route::get('booking/trash', [
        'uses' => 'BookingsController@DeleteForever',
        'as'   => 'backend.booking.delete.page'
    ]);

    Route::get('booking/restore/{booking_id}', [
        'uses' => 'BookingsController@Restore',
        'as'   => 'backend.booking.restore'
    ]);

    Route::get('booking/deleteall', [
        'uses' => 'BookingsController@DeleteAll',
        'as'   => 'backend.booking.delete.all'
    ]);

    Route::get('booking/restoreall', [
        'uses' => 'BookingsController@RestoreAll',
        'as'   => 'backend.booking.restore.all'
    ]);

//-------------------------end of booking route---------------------------------

//-----------------------Customize route---------------------------

    Route::get('customize', [
        'uses' => 'CustomizesController@getCustomize',
        'as' => 'backend.customize'
    ]);

    Route::get('customize/create', [
        'uses' => 'CustomizesController@getCreateCustomize',
        'as' => 'backend.customize.get.create'
    ]);

    Route::post('customize/create', [
        'uses' => 'CustomizesController@postCreateCustomize',
        'as' => 'backend.customize.post.create'
    ]);

    Route::get('customize/edit/{customize_id}', [
        'uses' => 'CustomizesController@getUpdate',
        'as' => 'backend.customize.get.update'
    ]);

    Route::post('customize/update', [
        'uses' => 'CustomizesController@postUpdate',
        'as' => 'backend.customize.post.update'
    ]);

    Route::get('customize/delete/{customize_id}', [
        'uses' => 'CustomizesController@getDelete',
        'as' => 'backend.customize.delete'
    ]);

    Route::get('customize/single/{customize_slug}', [
        'uses' => 'CustomizesController@getSingleCustomize',
        'as' => 'backend.customize.single.customize'
    ]);

    Route::get('customize/trash/{customize_id}', [
        'uses' => 'CustomizesController@getTrash',
        'as'  => 'backend.customize.trash'
    ]);

    Route::get('customize/trash', [
        'uses' => 'CustomizesController@DeleteForever',
        'as'   => 'backend.customize.delete.page'
    ]);

    Route::get('customize/restore/{customize_id}', [
        'uses' => 'CustomizesController@Restore',
        'as'   => 'backend.customize.restore'
    ]);

    Route::get('customize/{filename}', [
        'uses' => 'CustomizesController@getImage',
        'as'   => 'backend.customize.image'
    ]);

    Route::get('customize/deleteall', [
        'uses' => 'CustomizesController@DeleteAll',
        'as'   => 'backend.customize.delete.all'
    ]);

    Route::get('customize/restoreall', [
        'uses' => 'CustomizesController@RestoreAll',
        'as'   => 'backend.customize.restore.all'
    ]);

//-------------------------end of customize route---------------------------------

//-----------------------Gallery route---------------------------

    Route::get('gallery', [
        'uses' => 'GalleriesController@getGallery',
        'as' => 'backend.gallery'
    ]);

    Route::get('gallery/create', [
        'uses' => 'GalleriesController@getCreateGallery',
        'as' => 'backend.gallery.get.create'
    ]);

    Route::post('gallery/create', [
        'uses' => 'GalleriesController@postCreateGallery',
        'as' => 'backend.gallery.post.create'
    ]);

    Route::get('gallery/edit/{gallery_id}', [
        'uses' => 'GalleriesController@getUpdate',
        'as' => 'backend.gallery.get.update'
    ]);

    Route::post('gallery/update', [
        'uses' => 'GalleriesController@postUpdate',
        'as' => 'backend.gallery.post.update'
    ]);

    Route::get('gallery/delete/{gallery_id}', [
        'uses' => 'GalleriesController@getDelete',
        'as' => 'backend.gallery.delete'
    ]);

    Route::get('gallery/single/{gallery_slug}', [
        'uses' => 'GalleriesController@getSingleGallery',
        'as' => 'backend.gallery.single.gallery'
    ]);

    Route::get('gallery/trash/{gallery_id}', [
        'uses' => 'GalleriesController@getTrash',
        'as'  => 'backend.gallery.trash'
    ]);

    Route::get('gallery/trash', [
        'uses' => 'GalleriesController@DeleteForever',
        'as'   => 'backend.gallery.delete.page'
    ]);

    Route::get('gallery/restore/{gallery_id}', [
        'uses' => 'GalleriesController@Restore',
        'as'   => 'backend.gallery.restore'
    ]);

    Route::get('gallery/deleteall', [
        'uses' => 'GalleriesController@DeleteAll',
        'as'   => 'backend.gallery.delete.all'
    ]);

    Route::get('gallery/restoreall', [
        'uses' => 'GalleriesController@RestoreAll',
        'as'   => 'backend.gallery.restore.all'
    ]);

//-------------------------end of gallery route---------------------------------

//-----------------------Affiliate route---------------------------

    Route::get('affiliate', [
        'uses' => 'AffiliatesController@getAffiliate',
        'as' => 'backend.affiliate'
    ]);

    Route::get('affiliate/create', [
        'uses' => 'AffiliatesController@getCreateAffiliate',
        'as' => 'backend.affiliate.get.create'
    ]);

    Route::post('affiliate/create', [
        'uses' => 'AffiliatesController@postCreateAffiliate',
        'as' => 'backend.affiliate.post.create'
    ]);

    Route::get('affiliate/edit/{affiliate_id}', [
        'uses' => 'AffiliatesController@getUpdate',
        'as' => 'backend.affiliate.get.update'
    ]);

    Route::post('affiliate/update', [
        'uses' => 'AffiliatesController@postUpdate',
        'as' => 'backend.affiliate.post.update'
    ]);

    Route::get('affiliate/delete/{affiliate_id}', [
        'uses' => 'AffiliatesController@getDelete',
        'as' => 'backend.affiliate.delete'
    ]);

    Route::get('affiliate/single/{affiliate_slug}', [
        'uses' => 'AffiliatesController@getSingleAffiliate',
        'as' => 'backend.affiliate.single.affiliate'
    ]);

    Route::get('affiliate/trash/{affiliate_id}', [
        'uses' => 'AffiliatesController@getTrash',
        'as'  => 'backend.affiliate.trash'
    ]);

    Route::get('affiliate/trash', [
        'uses' => 'AffiliatesController@DeleteForever',
        'as'   => 'backend.affiliate.delete.page'
    ]);

    Route::get('affiliate/restore/{affiliate_id}', [
        'uses' => 'AffiliatesController@Restore',
        'as'   => 'backend.affiliate.restore'
    ]);

    Route::get('affiliate/deleteall', [
        'uses' => 'AffiliatesController@DeleteAll',
        'as'   => 'backend.affiliate.delete.all'
    ]);

    Route::get('affiliate/restoreall', [
        'uses' => 'AffiliatesController@RestoreAll',
        'as'   => 'backend.affiliate.restore.all'
    ]);

//-------------------------end of photo route---------------------------------

//-----------------------Photo route---------------------------

    Route::get('photo', [
        'uses' => 'PhotosController@getPhoto',
        'as' => 'backend.photo'
    ]);

    Route::get('photo/create', [
        'uses' => 'PhotosController@getCreatePhoto',
        'as' => 'backend.photo.get.create'
    ]);

    Route::post('photo/create', [
        'uses' => 'PhotosController@postCreatePhoto',
        'as' => 'backend.photo.post.create'
    ]);

    Route::get('photo/edit/{photo_id}', [
        'uses' => 'PhotosController@getUpdate',
        'as' => 'backend.photo.get.update'
    ]);

    Route::post('photo/update', [
        'uses' => 'PhotosController@postUpdate',
        'as' => 'backend.photo.post.update'
    ]);

    Route::get('photo/delete/{photo_id}', [
        'uses' => 'PhotosController@getDelete',
        'as' => 'backend.photo.delete'
    ]);

    Route::get('photo/single/{photo_slug}', [
        'uses' => 'PhotosController@getSinglePhoto',
        'as' => 'backend.photo.single.photo'
    ]);

    Route::get('photo/trash/{photo_id}', [
        'uses' => 'PhotosController@getTrash',
        'as'  => 'backend.photo.trash'
    ]);

    Route::get('photo/trash', [
        'uses' => 'PhotosController@DeleteForever',
        'as'   => 'backend.photo.delete.page'
    ]);

    Route::get('photo/restore/{photo_id}', [
        'uses' => 'PhotosController@Restore',
        'as'   => 'backend.photo.restore'
    ]);

    Route::get('affiliate/deleteall', [
        'uses' => 'AffiliateController@DeleteAll',
        'as'   => 'backend.affiliate.delete.all'
    ]);

    Route::get('affiliate/restoreall', [
        'uses' => 'AffiliateController@RestoreAll',
        'as'   => 'backend.affiliate.restore.all'
    ]);

//-------------------------end of photo route---------------------------------

//-------------------------contact route-------------------------------------
    Route::get('contact-us', [
        'uses' => 'ContactsController@getContactForm',
        'as'   => 'backend.contact'
    ]);

    Route::post('contact-us', [
        'uses' => 'ContactsController@postMessage',
        'as'   => 'backend.contact.post.create'
    ]);

//---------------------------------------------------------------------------

    Route::get('logout', [
        'uses' => 'UserController@getLogout',
        'as'   => 'admin.logout'
    ]);

});

//---------------------------------END OF ADMIN MIDDLEWARE------------------------------------
//--------------------------------------------------------------------------------------------


