@extends('backend.layouts.index')
@section('content')
    <style>
        .rating{
            margin: 0 auto;
            width: 50%;
        }
        .btn-edit{
            background-color: dodgerblue;
            border: none;
            border-radius: 3px;
            height: 25px;
        }
        .overall{
            margin-left: 130px;

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
        .star{
            color: #ccc;
            cursor: pointer;
            transition: all 0.2s linear;
            /*margin-left: -30px;*/
        }
        .star:first-of-type{
            /*margin-left: 30px;*/
        }
        .star-checked{
            color: gold;
        }
        .star-checked1{
            color: gold;
        }
        b.r{
            color: red;
        }
        b.g{
            color: green;
        }
    </style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title" align="center">{{ ucfirst($review->name) }} | Last modified by: {{ $review->user->name }}</h4>
                            <p class="category" align="center">Last updated on
                                    {{ $review->updated_at }}
                            </p>
                        </div>
                        <div class="card-content table-responsive">
                            @if(Storage::disk('local')->has($review->image))
                                <section class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="{{ route('backend.review.image', ['filename' => $review->image]) }}" alt="" class="img-responsive" style=" border-radius:2px;height:100px;width:100px;float:left;margin-left:-20px;">
                                    </div>
                                </section>
                            @endif
                            <p align="center">{{ $review->description }}</p>



                    <div class="rating">
                        <div class="row">
                            <br/>
                            <div class="col-md-6 overall">
                                <label><strong>Overall Rating</strong></label>
                                <input type="hidden" name="overall" id="overall" value="{{ $review->overall }}">
                                <i class="fa fa-star star g" id="star-1f"></i>
                                <i class="fa fa-star star g" id="star-2f"></i>
                                <i class="fa fa-star star g" id="star-3f"></i>
                                <i class="fa fa-star star g" id="star-4f"></i>
                                <i class="fa fa-star star g" id="star-5f"></i>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Meals</label>
                                    <input type="hidden" name="meals" id="meals" value="{{ $review->meals }}">
                                    <i class="fa fa-star star a" id="star-1"></i>
                                    <i class="fa fa-star star a" id="star-2"></i>
                                    <i class="fa fa-star star a" id="star-3"></i>
                                    <i class="fa fa-star star a" id="star-4"></i>
                                    <i class="fa fa-star star a" id="star-5"></i>
                                </div>
                                <div class="col-md-6">
                                    <label>Accommodation</label>
                                    <input type="hidden" name="accommodation" id="accommodation" value="{{ $review->accommodation }}">
                                    <i class="fa fa-star star b" id="star-1a"></i>
                                    <i class="fa fa-star star b" id="star-2a"></i>
                                    <i class="fa fa-star star b" id="star-3a"></i>
                                    <i class="fa fa-star star b" id="star-4a"></i>
                                    <i class="fa fa-star star b" id="star-5a"></i>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pre-Trip Information</label>
                                    <input type="hidden" name="pre_info" id="pre_info" value="{{ $review->pre_info }}">
                                    <i class="fa fa-star star c" id="star-1b"></i>
                                    <i class="fa fa-star star c" id="star-2b"></i>
                                    <i class="fa fa-star star c" id="star-3b"></i>
                                    <i class="fa fa-star star c" id="star-4b"></i>
                                    <i class="fa fa-star star c" id="star-5b"></i>
                                </div>
                                <div class="col-md-6">
                                    <label>Transportation</label>
                                    <input type="hidden" name="transportation" id="transportation" value="{{ $review->transportation }}">
                                    <i class="fa fa-star star d" id="star-1c"></i>
                                    <i class="fa fa-star star d" id="star-2c"></i>
                                    <i class="fa fa-star star d" id="star-3c"></i>
                                    <i class="fa fa-star star d" id="star-4c"></i>
                                    <i class="fa fa-star star d" id="star-5c"></i>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Staffs</label>
                                    <input type="hidden" name="staffs" id="staffs" value="{{ $review->staffs }}">
                                    <i class="fa fa-star star e" id="star-1d"></i>
                                    <i class="fa fa-star star e" id="star-2d"></i>
                                    <i class="fa fa-star star e" id="star-3d"></i>
                                    <i class="fa fa-star star e" id="star-4d"></i>
                                    <i class="fa fa-star star e" id="star-5d"></i>
                                </div>
                                <div class="col-md-6">
                                    <label>Value for Money</label>
                                    <input type="hidden" name="money_value" id="money_value" value="{{ $review->money_value }}">
                                    <i class="fa fa-star star f" id="star-1e"></i>
                                    <i class="fa fa-star star f" id="star-2e"></i>
                                    <i class="fa fa-star star f" id="star-3e"></i>
                                    <i class="fa fa-star star f" id="star-4e"></i>
                                    <i class="fa fa-star star f" id="star-5e"></i>
                                    <br>
                                    <br>
                                </div>
                            </div>
                    </div>

                            <div class="single-button">
                            <button class="btn-edit"><a href="{{ route('backend.review.get.update', ['review_id' => $review->id]) }}">Edit</a></button>
                            <button class="btn-delete"><a href="{{ route('backend.review.trash', ['review_id' => $review->id]) }}">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('/assets/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.a').ready(function () {
                //get the id of star
                var value = $(('#meals')).val();
                switch (value) {
                    case "1":
                        $("#star-1").addClass('star-checked');
                        $('.display').val(value);
                        break;
                    case "2":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        $('.display').val(value);
                        break;
                    case "3":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        $("#star-3").addClass('star-checked');
                        $('.display').val(value);
                        break;
                    case "4":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        $("#star-3").addClass('star-checked');
                        $("#star-4").addClass('star-checked');
                        $('.display').val(value);
                        break;
                    case "5":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        $("#star-3").addClass('star-checked');
                        $("#star-4").addClass('star-checked');
                        $("#star-5").addClass('star-checked');
                        $('.display').val(value);
                        break;
                }
            });


            $('.b').ready(function () {
                //get the id of star
                var value = $(('#accommodation')).val();
                switch (value) {
                    case "1":
                        $("#star-1a").addClass('star-checked');
                        break;
                    case "2":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        break;
                    case "3":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        $("#star-3a").addClass('star-checked');
                        break;
                    case "4":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        $("#star-3a").addClass('star-checked');
                        $("#star-4a").addClass('star-checked');
                        break;
                    case "5":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        $("#star-3a").addClass('star-checked');
                        $("#star-4a").addClass('star-checked');
                        $("#star-5a").addClass('star-checked');
                        break;
                }
            });

            $('.c').ready(function () {
                //get the id of star
                var value = $(('#pre_info')).val();
                switch (value) {
                    case "1":
                        $("#star-1b").addClass('star-checked');
                        break;
                    case "2":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        break;
                    case "3":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        $("#star-3b").addClass('star-checked');
                        break;
                    case "4":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        $("#star-3b").addClass('star-checked');
                        $("#star-4b").addClass('star-checked');
                        break;
                    case "5":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        $("#star-3b").addClass('star-checked');
                        $("#star-4b").addClass('star-checked');
                        $("#star-5b").addClass('star-checked');
                        break;
                }
            });

            $('.d').ready(function () {
                //get the id of star
                var value = $(('#transportation')).val();
                switch (value) {
                    case "1":
                        $("#star-1c").addClass('star-checked');
                        break;
                    case "2":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        break;
                    case "3":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        $("#star-3c").addClass('star-checked');
                        break;
                    case "4":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        $("#star-3c").addClass('star-checked');
                        $("#star-4c").addClass('star-checked');
                        break;
                    case "5":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        $("#star-3c").addClass('star-checked');
                        $("#star-4c").addClass('star-checked');
                        $("#star-5c").addClass('star-checked');
                        break;
                }
            });

            $('.e').ready(function () {
                //get the id of star
                var value = $(('#staffs')).val();
                switch (value) {
                    case "1":
                        $("#star-1d").addClass('star-checked');
                        break;
                    case "2":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        break;
                    case "3":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        $("#star-3d").addClass('star-checked');
                        break;
                    case "4":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        $("#star-3d").addClass('star-checked');
                        $("#star-4d").addClass('star-checked');
                        break;
                    case "5":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        $("#star-3d").addClass('star-checked');
                        $("#star-4d").addClass('star-checked');
                        $("#star-5d").addClass('star-checked');
                        break;
                }
            });

            $('.f').ready(function () {
                //get the id of star
                var value = $(('#money_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1e").addClass('star-checked');
                        break;
                    case "2":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        break;
                    case "3":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        $("#star-3e").addClass('star-checked');
                        break;
                    case "4":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        $("#star-3e").addClass('star-checked');
                        $("#star-4e").addClass('star-checked');
                        break;
                    case "5":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        $("#star-3e").addClass('star-checked');
                        $("#star-4e").addClass('star-checked');
                        $("#star-5e").addClass('star-checked');
                        break;
                }
            });

            $('.g').ready(function () {
                //get the id of star
                var value = $(('#overall')).val();
                switch (value) {
                    case "1":
                        $("#star-1f").addClass('star-checked');
                        break;
                    case "2":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        break;
                    case "3":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        $("#star-3f").addClass('star-checked');
                        break;
                    case "4":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        $("#star-3f").addClass('star-checked');
                        $("#star-4f").addClass('star-checked');
                        break;
                    case "5":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        $("#star-3f").addClass('star-checked');
                        $("#star-4f").addClass('star-checked');
                        $("#star-5f").addClass('star-checked');
                        break;
                }
            });
        });
    </script>
@endsection