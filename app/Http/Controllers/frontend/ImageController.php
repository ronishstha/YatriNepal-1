<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function getImage($filename){
        $file = Storage::disk('banner')->get($filename);
        return new Response($file, 200);
    }
}
