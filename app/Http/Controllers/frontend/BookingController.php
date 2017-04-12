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
        $itinSlug = $itinerary->slug;
        $booking->date = $request['date'];
        $bookingSave = $itinerary->bookings()->save($booking);

        if ($bookingSave) {
            $booking_id = $booking->id;  //getting the id of booking that has just been saved

            $booked = Booking::where('id', $booking_id)->first();
            $trip = $itinerary->title;

            $date = $request['date'];


            for ($i = 1; $i <= $number; $i++) {

                $titl = array();
                $firstname = array();
                $middlename = array();
                $lastname = array();
                $nationalit = array();
                $stat = array();
                $emai = array();
                $mobil = array();
                $landlin = array();
                $dateofbirth = array();
                $occupatio = array();
                $mailingaddress = array();
                $passportno = array();
                $placeofissue = array();
                $issuedate = array();
                $expirationdate = array();
                $emergencycontact = array();

                $title = $request['title' . $i];
                $first_name = $request['first_name' . $i];
                $middle_name = $request['middle_name' . $i];
                $last_name = $request['last_name' . $i];
                $nationality = $request['nationality' . $i];
                $state = $request['state' . $i];
                $email = $request['email' . $i];
                $mobile = $request['mobile' . $i];
                $landline = $request['landline' . $i];
                $date_of_birth = $request['date_of_birth' . $i];
                $occupation = $request['occupation' . $i];
                $mailing_address = $request['mailing_address' . $i];
                $passport_no = $request['passport_no' . $i];
                $place_of_issue = $request['place_of_issue' . $i];
                $issue_date = $request['issue_date' . $i];
                $expiration_date = $request['expiration_date' . $i];
                $emergency_contact = $request['emergency_contact' . $i];
                $status = "published";

                array_push($titl, $title);
                array_push($firstname, $first_name);
                array_push($middlename, $middle_name);
                array_push($lastname, $last_name);
                array_push($nationalit, $nationality);
                array_push($stat, $state);
                array_push($emai, $email);
                array_push($mobil, $mobile);
                array_push($landlin, $landline);
                array_push($dateofbirth, $date_of_birth);
                array_push($occupatio, $occupation);
                array_push($mailingaddress, $mailing_address);
                array_push($passportno, $passport_no);
                array_push($placeofissue, $place_of_issue);
                array_push($issuedate, $issue_date);
                array_push($expirationdate, $expiration_date);
                array_push($emergencycontact, $emergency_contact);


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
                $bookDetail = $bookdetails->save();
            }


            try {
                if ($bookDetail) {
                    $first_name = $request['first_name1'];
                    $email = $request['email1'];
                    $mobile = $request ['mobile1'];
                    $adminMail = Mail::send('backend.booking.booking_message_admin', [
                        'number' => $number,
                        'trip' => $trip,
                        'trip_code' => $trip_code,
                        'date' => $date,
                        'mobile' => $mobile,
                        'email' => $email,
                        'titl' => $title,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'lastname' => $lastname,
                        'nationalit' => $nationalit,
                        'stat' => $stat,
                        'emai' => $emai,
                        'mobil' => $mobil,
                        'landlin' => $landlin,
                        'dateofbirth' => $dateofbirth,
                        'occupatio' => $occupatio,
                        'mailingaddress' => $mailingaddress,
                        'passportno' => $passportno,
                        'placeofissue' => $placeofissue,
                        'issuedate' => $issuedate,
                        'expirationdate' => $expirationdate,
                        'emergencycontact' => $emergencycontact
                    ], function ($msg) use ($first_name, $email) {
                        $msg->from($email, $first_name);
                        $msg->to('stharonish@gmail.com', 'Admin');
                        $msg->subject('New booking received');
                    });

                    $userMail = Mail::send('backend.booking.booking_message_user', [
                        'number' => $number,
                        'trip' => $trip,
                        'trip_code' => $trip_code,
                        'date' => $date,
                        'titl' => $title,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'lastname' => $lastname,
                        'nationalit' => $nationalit,
                        'stat' => $stat,
                        'emai' => $emai,
                        'mobil' => $mobil,
                        'landlin' => $landlin,
                        'dateofbirth' => $dateofbirth,
                        'occupatio' => $occupatio,
                        'mailingaddress' => $mailingaddress,
                        'passportno' => $passportno,
                        'placeofissue' => $placeofissue,
                        'issuedate' => $issuedate,
                        'expirationdate' => $expirationdate,
                        'emergencycontact' => $emergencycontact], function ($msg) use ($first_name, $email) {
                        $msg->from('yatrinepalserver@gamil.com', 'Yatri Nepal');
                        $msg->to($email, $first_name);
                        $msg->subject('Thank you for booking');
                    });
                    return redirect()->route('details', ['slug' => $itinSlug])->with(['successBooking' => 'success']);

                }
            } catch (exception $e) {
                return redirect()->route('details', ['slug' => $itinSlug])->with(['failMail' => 'ok']);
            }


            if ($bookingSave || $bookDetail != 1)
                return redirect()->route('details', ['slug' => $itinSlug])->with(['failBooking' => 'failed']);
        }


    }
}
