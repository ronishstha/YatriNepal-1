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
                            <h4 class="title">Update Affiliate</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.affiliate.post.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($affiliate) ? $affiliate->title : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Link</label>
                                            <input type="text" class="form-control" name="link" id="link" value="{{ Request::old('link') ? Request::old('link') : isset($affiliate) ? $affiliate->link : '' }}">
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($affiliate->image))
                                    @if(file_exists(public_path(). '/affiliate/' . $affiliate->image))
                                        <td><img src="{{ URL::asset('affiliate/' . $affiliate->image) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                    @endif
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Image</label>
                                            <input type="file" id="fileupload-example-3" name="image" value="{{ Request::old('image') ? Request::old('image') : isset($affiliate) ? $affiliate->image : '' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($affiliate->status =="published") selected @endif>published</option>
                                                <option @if($affiliate->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($affiliate->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="affiliate_id" value="{{ $affiliate->id }}">
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
