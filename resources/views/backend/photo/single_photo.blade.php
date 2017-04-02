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
    </style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title" align="center">{{ ucfirst($photo->image) }} | Last modified by: {{ $photo->user->name }}</h4>
                            <p class="category" align="center">Last updated on
                                    {{ $photo->updated_at }}
                            </p>
                        </div>


                        <div class="card-content table-responsive">
                            <p align="center"><strong>Gallery:</strong> {{ $photo->gallery->title }}  </p>

                            <section class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <td><img src="{{ URL::asset('gallery/' . $photo->gallery->title . '/' . $photo->image) }}" style="height:400px;width:400px;border-radius:3px"></td>
                                </div>
                            </section><br>


                            <div class="single-button">
                            <button class="btn-edit"><a href="{{ route('backend.photo.get.update', ['photo_id' => $photo->id]) }}">Edit</a></button>
                            <button class="btn-delete"><a href="{{ route('backend.photo.trash', ['photo_id' => $photo->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection