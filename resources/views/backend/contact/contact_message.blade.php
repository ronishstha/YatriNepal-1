<style>
    body{
        font-family: sans-serif;
    }
</style>
<h2>A message has been received from {{ $first_name }} {{$last_name}}</h2>
<p> <{{ $email }}> </p>

<p>
    <strong>First Name:</strong> {{ $first_name }}
</p>

<p>
    <strong>Last Name:</strong> {{ $last_name }}
</p>

@if(!empty($phone_no))
    <p>
    <strong>Phone no:</strong> {{ $phone_no }}
    </p>
@endif


<p>
    <strong>Email:</strong> {{ $email }}
</p>

<p>
    <strong>Message:</strong> {{ $description }}
</p>
