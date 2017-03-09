<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('frontend.index');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->back()->with(['fail' => 'Name and password do not match']);
        }
        return redirect()->route('backend.dashboard');
    }
}
