<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;
use App\Itinerary;
use App\User;
use App\Country;
use App\Bookdetail;
use Mail;

class BookingsController extends Controller
{
    public function getBooking(){
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.booking.booking', ['bookings' => $bookings]);
    }

    public function getFirstBooking(){
        $itineraries = Itinerary::all();
        return view('backend.booking.create_firstbooking', ['itineraries' => $itineraries]);
    }

    public function postFirstBooking(Request $request){
        $this->validate($request, [
            'number' => 'required',
            'itinerary' => 'required',
            'date' => 'required'
        ]);

        $trip = $request['itinerary'];
        $itinerary = Itinerary::where('title', $trip)->first();
        $itinerar = $itinerary->id;
        $date = $request['date'];
        $number = $request['number'];
        return redirect()->route('backend.booking.get.create', ['itinerar' => $itinerar, 'date' => $date, 'number' => $number]);
    }

    public function getCreateBooking($itinerar, $date, $number){
        $itinerary = Itinerary::where('id', $itinerar)->first();
        $dat = $date;
        $numbe = $number;
        return view('backend.booking.create_booking', ['itinerary' => $itinerary, 'dat' => $dat, 'numbe' => $numbe]);
    }

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

        if ($number == 1) {
            $title = $request['title'];
            $first_name = $request['first_name'];
            $middle_name = $request['middle_name'];
            $last_name = $request['last_name'];
            $nationality = $request['nationality'];
            $state = $request['state'];
            $email = $request['email'];
            $mobile = $request['mobile'];
            $landline = $request['landline'];
            $date_of_birth = $request['date_of_birth'];
            $occupation = $request['occupation'];
            $mailing_address = $request['mailing_address'];
            $passport_no = $request['passport_no'];
            $place_of_issue = $request['place_of_issue'];
            $issue_date = $request['issue_date'];
            $expiration_date = $request['expiration_date'];
            $emergency_contact = $request['emergency_contact'];
            $status = $request['status'];


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

            Mail::send('backend.booking.booking_message_admin', [
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

            Mail::send('backend.booking.booking_message_user', [
                'trip' => $trip,
                'trip_code' => $trip_code,
                'date' => $date], function($msg) use($first_name, $last_name, $email){
                $msg->from('yatrinepalserver@gamil.com', 'Yatri Nepal');
                $msg->to($email, $first_name);
                $msg->subject('Thank you for booking');
            });
        }

        if($number > 1){
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
                $status = $request['status'.$i];

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
            Mail::send('backend.booking.booking_message_admin', [
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

            Mail::send('backend.booking.booking_message_user', [
                'trip' => $trip,
                'trip_code' => $trip_code,
                'date' => $date], function($msg) use($first_name, $email){
                $msg->from('yatrinepalserver@gamil.com', 'Yatri Nepal');
                $msg->to($email, $first_name);
                $msg->subject('Thank you for booking');
            });
        }



        return redirect()->route('backend.booking')->with(['success' => 'Successfully created']);
    }

    public function getUpdate($booking_id){
        $booking = Booking::findorFail($booking_id);
        $itineraries = Itinerary::all();
        return view('backend.booking.update_booking', ['booking' => $booking, 'itineraries' => $itineraries]);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'itinerary' => 'required',
            'date' => 'required',
            'number' => 'required',
        ]);
        $booking = Booking::findOrFail($request['booking_id']);
        $trip = $request['itinerary'];
        $booking->status = $request['status'];
        $booking->number = $request['number'];
        $itinerary = Itinerary::where('title', $trip)->first();
        $booking->itinerary_id = $itinerary->id;
        $booking->update();
        return redirect()->route('backend.booking')->with(['success' => 'successfully updated']);
    }

    public function getDelete($booking_id){
        $booking = Booking::findOrFail($booking_id);
        $booking->delete();
        return redirect()->route('backend.booking.delete.page')->with(['success' => 'Successfully deleted']);
    }

    public function getTrash($booking_id){
        $booking = Booking::findOrFail($booking_id);
        $booking->status = "trash";
        $booking->update();
        return redirect()->route('backend.booking')->with(['success' => 'Successfully moved to trash']);
    }

    public function getSingleBooking($booking_id){
        $bookdetails = Bookdetail::where('booking_id', $booking_id)
            ->get();
        $booking = Booking::where('id', $booking_id)->first();
        return view('backend.booking.single_booking', ['bookdetails' => $bookdetails, 'booking' => $booking]);
    }

    public function DeleteForever(){
        $bookings = Booking::all();
        return view('backend.booking.trash_booking', ['bookings' => $bookings ]);
    }

    public function Restore($booking_id){
        $booking = Booking::findorFail($booking_id);
        $booking->status = "published";
        $booking->update();
        return redirect()->route('backend.booking');
    }
}
