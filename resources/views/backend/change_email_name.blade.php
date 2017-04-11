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
            height: 400px;
        }
        .form-input:nth-child(1)::before{
            content: "\f023";
        }
        .form-input:nth-child(2)::before{
            content: "\f007";
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
        <form action="{{ route('backend.update.email.password') }}" method="post">
            <div class="form-input">
                <input class="text2" type="password" name="old_password" id="old_password" placeholder="Enter Your Password"/>
            </div>
            <div class="form-input">
                <input class="text2" type="text" name="name" id="name" placeholder="Enter New Name"/>
            </div>
            <div class="form-input">
                <input class="text2" type="text" name="email" id="email" placeholder="Enter New Email"/>
            </div>
            <div class="form-input">
                <input class="text2" type="text" name="confirm_email" id="confirm_email" placeholder="Confirm Email"/>
            </div>
            <br/>
            <input class="submit" name ='submit' type="submit" value="Change Password"/>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>

@endsection