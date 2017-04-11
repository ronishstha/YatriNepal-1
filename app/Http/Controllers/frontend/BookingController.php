<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Booking;
use App\Itinerary;
use App\User;
use App\Country;
use App\Bookdetail;

class BookingController extends Controller
{
    public function postCreateBooking(Request $request)
    {
        /*$this->validate($request, [
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'nationality' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);*/

        $booking = new Booking();
        $number = $request['number'];
        $booking->number = $request['number'];
        $trip = $request['itinerary'];

        $itinerary = Itinerary::where('id', $trip)->first();
        $trip_code = $itinerary->itinerary_code;
        $booking->date = $request['date'];
        $itinerary->bookings()->save($booking);

        $booking_id = $booking->id;  //getting the id of booking that has just been saved

        $booked = Booking::where('id', $booking_id)->first();
        $trip = $itinerary->title;
        $date = $request['date'];


            for($i = 1; $i <= $number; $i++){
                $title = $request['title'.$i];
                $first_name = $request['first_name'.$i];
                $middle_name = $request['middle_name'.$i];
                $last_name = $request['last_name'.$i];
                $nationality = $request['nationality'.$i];
                $state = $request['state'.$i];
                $email = $request['email'.$i];
                $mobile = $request['mobile'.$i];
                $landline = $request['landline'.$i];
                $date_of_birth = $request['date_of_birth'.$i];
                $occupation = $request['occupation'.$i];
                $mailing_address = $request['mailing_address'.$i];
                $passport_no = $request['passport_no'.$i];
                $place_of_issue = $request['place_of_issue'.$i];
                $issue_date = $request['issue_date'.$i];
                $expiration_date = $request['expiration_date'.$i];
                $emergency_contact = $request['emergency_contact'.$i];
                $status = "published" ;

                $bookdetails = new Bookdetail();
                $bookdetails->title = $title;
                $bookdetails->first_name = $first_name;
                $bookdetails->middle_name = $middle_name;
                $bookdetails->last_name = $last_name;
                $bookdetails->nationality = $nationality;
                $bookdetails->state = $state;
                $bookdetails->email = $email;
                $bookdetails->mobile = $mobile;
                $bookdetails->landline = $landline;
                $bookdetails->date_of_birth = $date_of_birth;
                $bookdetails->occupation = $occupation;
                $bookdetails->mailing_address = $mailing_address;
                $bookdetails->passport_no = $passport_no;
                $bookdetails->place_of_issue = $place_of_issue;
                $bookdetails->issue_date = $issue_date;
                $bookdetails->expiration_date = $expiration_date;
                $bookdetails->emergency_contact = $emergency_contact;
                $bookdetails->status = $status;

                $bookdetails->itinerary()->associate($itinerary);
                $bookdetails->booking()->associate($booked);
                $bookdetails->save();
            }

            $first_name = $request['first_name1'];
            $email = $request['email1'];
            $mobile = $request ['mobile1'];

        $mailAdmin = Mail::send('backend.booking.booking_message_admin', [
                'number' => $number,
                'trip' => $trip,
                'trip_code' => $trip_code,
                'date' => $date,
                'mobile' => $mobile,
                'email' => $email], function($msg) use($first_name, $email){
                $msg->from($email, $first_name);
                $msg->to('stharonish@gmail.com', 'Admin');
                $msg->subject('New booking received');
            });

            $mailUser = Mail::send('backend.booking.booking_message_user', [
                'trip' => $trip,
                'trip_code' => $trip_code,
                'date' => $date], function($msg) use($first_name, $email){
                $msg->from('yatrinepalserver@gamil.com', 'Yatri Nepal');
                $msg->to($email, $first_name);
                $msg->subject('Thank you for booking');
            });

        return redirect()->route('booking')->with(['success' => 'Successfully created']);
    }
}
