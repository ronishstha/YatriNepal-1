@extends('backend.layouts.index')

@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/form.css') }}">
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <style>
        .submit{
            width: 160px;
        }
        .fcontainer{
            height: 350px;
        }
    </style>

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
    @if(Session::has('success'))
        <section class="info-box success">
            {{ Session::get('success') }}
        </section>
    @endif

    <div class="fcontainer">
        <img src="{{ URL::asset('assets/img/avatar.png') }}">
        <form action="{{ route('backend.update.password') }}" method="post">
            <div class="form-input">
                <input class="text2" type="password" name="old_password" id="old_password" placeholder="Enter Previous Password"/>
            </div>
            <div class="form-input">
                <input class="text2" type="password" name="password" id="password" placeholder="Enter New Password"/>
            </div>
            <div class="form-input">
                <input class="text2" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password"/>
            </div>
            <br/>
            <input class="submit" name ='submit' type="submit" value="Change Password"/>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>

@endsection