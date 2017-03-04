@extends('backend.layouts.index')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Create Page</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.createpages') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{ Request::old('title') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Page</label>
                                            <select class="form-control" name="page" id="page" value="{{ Request::old('page') }}">
                                                <option>Page</option>
                                                <option>Home</option>
                                                <option>About</option>
                                                <option>Contact</option>
                                                <option>Career</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Content</label>
                                            <textarea row=20 class="form-control" name="content" id="content" value="{{ Request::old('content') }}"></textarea>
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary pull-right">Create</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="../assets/img/avatar.png" />
                            </a>
                        </div>

                        <div class="content">
                            <h6 class="category text-gray">CEO / Co-Founder</h6>
                            <h4 class="card-title">Ronish Shrestha</h4>
                            <p class="card-content">
                                Web Developer
                            </p>
                            <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
