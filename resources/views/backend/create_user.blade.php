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
        .form-input::before{
            content: "\f007";
            position: absolute;
            font-family: "FontAwesome";
            font-size: 30px;
            padding-left:5px;
            padding-top:7px;
            color:#9B5986;
        }
        .form-input:nth-child(2)::before{
            content: "\f007";
        }
        .form-input:nth-child(3)::before{
            content: "\f023";
        }
        .form-input:nth-child(4)::before{
            content: "\f023";
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
        <form action="{{ route('backend.user.post.create') }}" method="post">
            <div class="form-input">
                <input class="text2" type="text" name="name" id="name" placeholder="Enter Name"/>
            </div>
            <div class="form-input">
                <input class="text2" type="text" name="email" id="email" placeholder="Enter Email"/>
            </div>
            <div class="form-input">
                <input class="text2" type="password" name="password" id="password" placeholder="Enter New Password"/>
            </div>
            <div class="form-input">
                <input class="text2" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm New Password"/>
            </div>
            <br/>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            <input class="submit" name ="submit" type="submit" value="Create User"/>
        </form>
    </div>

@endsection