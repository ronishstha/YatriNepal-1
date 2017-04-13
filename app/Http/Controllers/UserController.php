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

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        $data = $request->all();
        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['old_password'], $user->password)) {
            return back()
                ->with('fail', 'The specified password does not match the database password');
        } else {
            $email = $user->email;
            $user->email = $email;
            $password = $request['password'];
            $user->password = bcrypt($password);
            $user->update();
            return redirect()->route('backend.changepassword')->with(['success' => 'Successfully changed']);
        }
    }

        public function getCreateUser(){
            return view('backend.create_user');
        }

        public function postCreateUser(Request $request){
            $this->validate($request, [
               'name' => 'required',
               'email' => 'required|unique:users',
               'password' => 'required|min:6',
               'confirm_password' => 'required|same:password'
            ]);
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->save();
            return redirect()->back()->with(['success' => 'User Successfully Added']);
        }

        public function changeEmailName(Request $request){
        $this->validate($request, [
            'old_password' => 'required',
            'email' => 'unique:users',
            'confirm_email' => 'same:email'
        ]);
        $data = $request->all();
        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['old_password'], $user->password)) {
            if (empty($request['email']) && empty($request['email'])){
                return back()->with('fail', 'The specified password does not match the database password. Enter atleast a name or email');
            }
            else {
                return back()
                    ->with('fail', 'The specified password does not match the database password');
            }
        } 
        else {
            if (empty($request['email']) && empty($request['name'])){
                return back()->with('fail', 'Enter atleast a name or email');
            }
            else{
                $email = $user->email;
                $name = $user->name;
                if(!empty($request['email'])){
                    $email = $request['email'];
                }
                if(!empty($request['name'])){
                    $name = $request['name'];
                }
                $user->email = $email;
                $user->name = $name;
                $user->update();
                return redirect()->back()->with(['success' => 'Successfully changed']);
            }
        }
    }

    public function getDelete($user_id){
        $user = User::where('id', $user_id)->first();
        $user->delete();
        return redirect()->route('backend.user')->with(['success' => 'Successfully deleted']);
    }
}
