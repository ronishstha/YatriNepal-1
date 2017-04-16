@extends('backend.layouts.index')
@section('content')
    <style>
        #fileupload-example-3::-webkit-file-upload-button {
            color: gray;
            border: none;
            height: 30px;
            border-radius: 3px;
            background: #fff;
            border: 1px solid #ccc;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Gallery</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.gallery.post.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Itinerary</label>
                                            <select class="form-control" name="itinerary" id="itinerary">
                                                @foreach($itineraries as $itinerary)
                                                    <option @if($gallery->itinerary->title == "$itinerary->title") selected @endif> {{$itinerary->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($gallery->image))
                                    @if(file_exists(public_path(). '/gallery/' . $gallery->image))
                                        <td><img src="{{ URL::asset('gallery/' . $gallery->image ) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                    @endif
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Image</label>
                                            <input type="file" id="fileupload-example-3" name="image" value="{{ Request::old('image') ? Request::old('image') : isset($itinerary) ? $itinerary->image : '' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($gallery->status =="published") selected @endif>published</option>
                                                <option @if($gallery->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($gallery->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                                <button type="submit" class="btn btn-primary pull-right">Edit</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
