<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactsController extends Controller
{
    public function getContactForm(){
        return view('backend.contact.create_contact');
    }
    public function postMessage(Request $request){
        $this->validate($request,[
           'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'description' => 'required'
        ]);
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $email = $request['email'];
        $phone_no = $request['phone_no'];
        $description = $request['description'];

        Mail::send('backend.contact.contact_message', [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone_no' => $phone_no,
            'email' => $email,
            'description' => $description], function($msg) use($first_name, $last_name, $email){
            $msg->from($email, $first_name . ' ' . $last_name);
            // Yatri Nepal email required
            $msg->to('stharonish@gmail.com', 'Admin');
            $msg->subject('Message from User');
        });

        Mail::send('backend.contact.contact_message_user', [
            'first_name' => $first_name,
            'last_name' => $last_name], function($msg) use($first_name, $email){
            $msg->from('yatrinepalserver@gmail.com', 'Yatri Nepal');
            $msg->to($email, 'first_name');
            $msg->subject('Message from User');
        });
        return redirect()->route('backend.contact')->with(['success' => 'Successfully posted']);
    }
}
