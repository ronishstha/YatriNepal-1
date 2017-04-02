@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    @if(Session::has('success'))
        <section class="info-box fail">
            {{ Session::get('success') }}
        </section>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Photo Trash</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                @php
                                    $count = 0;
                                    $i = 0;
                                @endphp
                                @foreach($photos as $photo)
                                    @php
                                        if($photo->status == "trash"){
                                            $i += 1;
                                    }
                                    @endphp
                                @endforeach
                                @if($i == 0)
                                    <p>Nothing in trash</p>
                                @else
                                    <thead class="text-warning">
                                    <th>title</th>
                                    <th>deleted by</th>
                                    <th>view</th>
                                    <th>restore</th>
                                    <th>delete</th>
                                    </thead>

                                    @foreach($photos as $photo)
                                        @if($photo->status == "trash")
                                            <tbody>
                                            <tr>
                                                <td><img src="{{ URL::asset('gallery/' . $photo->gallery->title . '/' . $photo->image) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                                <td>{{ $photo->user->name }}</td>
                                                <td><button class="btn-view"><a href="{{ route('backend.photo.single.photo', ['photo_id' => $photo->id]) }}">View</a></button></td>
                                                <td><button class="btn-edit"><a href="{{ route('backend.photo.restore', ['photo_id' => $photo->id]) }}">Restore</a></button></td>
                                                <td><button class="btn-delete"><a href="{{ route('backend.photo.delete', ['photo_id' => $photo->id]) }}">Delete</a></button></td>
                                            </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                 @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection