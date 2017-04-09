<?php

namespace App\Http\Controllers\frontend;


use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Customize;
use App\Itinerary;

class AuthController extends Controller
{
    use ThrottlesLogins;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function webRegister(Request $request)
    {

        return redirect()->route('details',['slug'=>$request['currentItinerary']]) ;
    }

    public function webRegisterPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha',
            'email' => 'required|email',
//            'password' => 'required|same:password_confirmation',
//            'password_confirmation' => 'required',
            'contact' => 'required|',
            'country' => 'required',
            'msg' => 'required',
            'CaptchaCode' => 'required|valid_captcha'
        ]);
        $customize = new Customize();
        $slug = $request['name'];
        $customize->name = $request['name'];
        $customize->email = $request['email'];
        $customize->contact_no = $request['contact'];
        $customize->country = $request['country'];
        $customize->description = $request['msg'];
        $customize->slug = str_slug($slug,'-');
        $customize->status = 'published';
        $user = User::get()->first();
        $itinerary = Itinerary::where('slug', $request['currentItinerary'])->first();
        $customize->user()->associate($user);
        $customize->itinerary()->associate($itinerary);
        $check = $customize->save();
        if ($check){
            return redirect()->route('details',['slug'=>$request['currentItinerary']])->with(['success' => 'Your queries has been submitted']);
        }
        else if(!$check){
            return redirect()->route('details', ['slug' => $request['currentItinerary']])->with(['failure' => 'Your queries couldnt be submitted.Please try again']);
        }



    }
}
