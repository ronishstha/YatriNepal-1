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
        .itinerary-gallery{
            padding-left: 200px;
            padding-right: 200px;
            padding-bottom: 30px;
        }

        .itgallery{
            padding-top: 2px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title" align="center">{{ ucfirst($gallery->title) }} | Last modified by: {{ $gallery->user->name }}</h4>
                            <p class="category" align="center">Last updated on
                                    {{ $gallery->updated_at }}
                            </p>
                        </div>
                        <div class="card-content table-responsive">
                            <p align="center"><strong>Itinerary:</strong> {{ $gallery->itinerary->title }}  </p>

                            <div class="itinerary-gallery">
                                @foreach($photos as $photo)
                                    @if(!empty($photo->image))
                                        @if(file_exists(public_path(). '/photo/' . $photo->image))
                                            <td><img class="itgallery" src="{{ URL::asset('gallery/' . $photo->gallery->title . '/' . $photo->image) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                        @endif
                                    @endif
                                @endforeach
                            </div>

                            <div class="single-button">
                            <button class="btn-edit"><a href="{{ route('backend.gallery.get.update', ['gallery_id' => $gallery->id]) }}">Edit</a></button>
                            <button class="btn-delete"><a href="{{ route('backend.gallery.trash', ['gallery_id' => $gallery->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection