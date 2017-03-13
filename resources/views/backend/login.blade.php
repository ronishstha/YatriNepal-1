    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/form.css') }}">


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
        <img src="{{ URL::asset('assets/img/avatar.png') }}">
        <form action="{{ route('admin.login.post') }}" method="post">
            <div class="form-input">
                <input class="text2" type="text" name="email" id="email" placeholder="Enter Email"/>
            </div>
            <div class="form-input">
                <input class="text2" type="password" name="password" id="password" placeholder="Enter Password"/>
            </div>
            <input class="submit" name ='submit' type="submit" value="Login"/>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
