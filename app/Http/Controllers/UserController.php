<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function changePassword(Request $request){
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        $data = $request->all();
        $user = User::find(auth()->user()->id);
        if(!Hash::check($data['old_password'], $user->password)){
            return back()
                ->with('error','The specified password does not match the database password');
        }else {
            $email = $user->email;
            $user->email = $email;
            $password = $request['password'];
            $user->password = bcrypt($password);
            $user->update();
            return redirect()->route('backend.changepassword')->with(['success' => 'Successfully changed']);
        }
    }
}
