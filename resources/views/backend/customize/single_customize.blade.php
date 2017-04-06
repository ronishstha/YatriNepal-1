@extends('backend.layouts.index')
@section('content')
    <style>
        .btn-edit{
            background-color: dodgerblue;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-edit a{
            color: ghostwhite;
        }
        .btn-delete{
            background-color: #e53935;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .btn-delete a{
            color: ghostwhite;
        }
        .single-button{
            width: 100px;
            margin-left:auto;
            margin-right: auto;
        }
        .cen{
            padding-left: 60px;
            padding-right: 60px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title" align="center">{{ ucfirst($customize->name) }} | Last modified by: {{ $customize->user->name }}</h4>
                            <p class="category" align="center">Last updated on
                                    {{ $customize->updated_at }}
                            </p>
                        </div>
                        <div class="card-content table-responsive">
                            <p class="cen"><strong>Email:</strong> {{ $customize->email }}</p>
                            <p class="cen"><strong>Contact No:</strong> {{ $customize->contact_no }}</p>
                            <p class="cen"><strong>Itinerary:</strong> {{ $customize->itinerary->title }}</p>
                            <h4 class="cen"><strong>Message</strong></h4>
                            <div class="cen">
                                <p class="cen">{!! $customize->description  !!}</p>
                            </div>
                            <div class="single-button">
                            <button class="btn-edit"><a href="{{ route('backend.customize.get.update', ['customize_id' => $customize->id]) }}">Edit</a></button>
                            <button class="btn-delete"><a href="{{ route('backend.customize.trash', ['customize_id' => $customize->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection