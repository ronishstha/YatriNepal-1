@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/form.css') }}">
@endsection


    @if(count($errors) > 0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </section>
    @endif

    @if(Session::has('fail'))
        <section class="info-box fail">
            {{ Session::get('fail') }}
        </section>
    @endif

    <div class="fcontainer">
        <img src="{{ URL::asset('avatar.png') }}">
        <form action="{{ route('admin.login') }}" method="post">
            <div class="form-input">
                <input class="text2" type="text" name="name" id="name" placeholder="Enter Username"/>
            </div>
            <div class="form-input">
                <input class="text2" type="password" name="password" id="password" placeholder="Enter Password"/>
            </div>
            <p class="formp"><input type="checkbox" name="logged"/>Keep me Logged in</p>
            <input class="submit" name ='submit' type="submit" value="Login"/>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
