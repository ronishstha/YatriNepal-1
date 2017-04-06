<style>
    body{
        font-family: sans-serif;
    }
</style>
<h2>A booking has been has been made for {{ $trip }} {{$trip_code}}</h2>
<p> {{ $email }} </p>

<p>
    <strong>No of People:</strong> {{ $number }}
</p>

<p>
    <strong>Booked For:</strong> {{ $date }}
</p>


<p>
        <strong>Contact no:</strong> {{ $mobile }}
</p>

<p>
    <strong>Email:</strong> {{ $email }}
</p>

<h3>Booking Details</h3>
@for($i = 0; $i < $number; $i++)
    <br>
    <h3 {{--align="center"--}}><strong>Person No:</strong> {{ $i + 1 }}</h3>
    <p {{--align="center"--}}><strong>Name:</strong> {{ $titl[$i] }} {{  $firstname[$i] }} {{ $middlename[$i] }} {{ $lastname[$i] }}</p>
    <p {{--align="center"--}}><strong>Nationality:</strong> {{ $nationalit[$i] }}</p>
    <p {{--align="center"--}}><strong>State:</strong> {{ $stat[$i] }}</p>
    <p {{--align="center"--}}><strong>Date of Birth:</strong> {{ $dateofbirth[$i] }}</p>
    <p {{--align="center"--}}><strong>Email:</strong> {{ $emai[$i] }}</p>
    <p {{--align="center"--}}><strong>Mobile:</strong> {{ $mobil[$i] }}</p>
    <p {{--align="center"--}}><strong>Landline:</strong> {{ $landlin[$i] }}</p>
    <p {{--align="center"--}}><strong>Occupation:</strong> {{ $occupatio[$i] }}</p>
    <p {{--align="center"--}}><strong>Passport No:</strong> {{ $passportno[$i] }}</p>
    <p {{--align="center"--}}><strong>Place of Issue:</strong> {{ $placeofissue[$i] }}</p>
    <p {{--align="center"--}}><strong>Issue Date:</strong> {{ $issuedate[$i] }}</p>
    <p {{--align="center"--}}><strong>Expiration Date:</strong> {{ $expirationdate[$i] }}</p>
    <h4 {{--align="center"--}}><strong>Detailed Mailing Address</strong></h4>
    <p {{--align="center"--}}>{!! $mailingaddress[$i] !!} </p>
    <h4 {{--align="center"--}}><strong>Emergency Contact</strong></h4>
    <p {{--align="center"--}}>{!! $emergencycontact[$i] !!}</p>
@endfor

