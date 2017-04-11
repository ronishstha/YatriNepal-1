<style>
    body{
        font-family: sans-serif;
    }
</style>
<h2>The booking that you made for {{ $trip }} {{$trip_code}} has been received</h2>

<p>We are really thankful that you chose us. We'll contact you shortly about further details.</p>

<h3>Here are the details of the booking that you've made</h3>

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
