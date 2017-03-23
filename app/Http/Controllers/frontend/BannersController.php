<?php
/**
 * Created by PhpStorm.
 * User: Psykohunter
 * Date: 3/20/2017
 * Time: 1:07 PM
 */
namespace App\Http\Controllers\frontend;

class BannersController extends Controller
{
    public function getBanner(){
        return view('frontend.layouts.Home.index');
    }
}