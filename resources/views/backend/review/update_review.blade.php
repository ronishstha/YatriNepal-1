@extends('backend.layouts.index')

@section('style')
    <link href="{{ URL::asset('/assets/css/table.css') }}" rel="stylesheet"/>
@endsection

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
        .star{
            color: #ccc;
            cursor: pointer;
            transition: all 0.2s linear;
            /*margin-left: -30px;*/
        }
        .star:first-of-type{
            /*margin-left: 30px;*/
        }
        .overall{
            margin-left: 130px;
        }
        .star_rating{
            margin: 0 auto;
            width: 80%;
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
    @if(count($errors) > 0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </section>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Update Review</h4>
                            <p class="category"></p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('backend.review.post.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ Request::old('name') ? Request::old('name') : isset($review) ? $review->name : '' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Itinerary</label>
                                            <select class="form-control" name="itinerary" id="itinerary">
                                                @foreach($itineraries as $itinerary)
                                                    <option @if($review->itinerary->title == "$itinerary->title") selected @endif> {{$itinerary->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($review->image))
                                    <td><img src="{{ URL::asset('review/' . $review->image ) }}" style="height:100px;width:100px;border-radius:3px"></td>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label id="fileupload-example-3-label" for="fileupload-example-3">Image</label>
                                            <input type="file" id="fileupload-example-3" name="image" value="{{ Request::old('image') ? Request::old('image') : isset($banner) ? $banner->image : '' }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Description</label>
                                            <textarea row=20 class="form-control" name="description" id="description" >{{ Request::old('description')? Request::old('description') : isset($review)? $review->description : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="star_rating">
                                    <div class="row">
                                        <div class="col-md-6 overall">
                                            <label><strong>Overall Rating</strong></label>
                                            <input type="hidden" name="overall" id="overall" value="0">
                                            <input type="hidden" name="overall_value" id="overall_value" value="{{ $review->overall }}">
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
                                            <input type="hidden" name="meals" id="meals" value="0">
                                            <input type="hidden" name="meals_value" id="meals_value" value="{{ $review->meals }}">
                                            <i class="fa fa-star star a" id="star-1"></i>
                                            <i class="fa fa-star star a" id="star-2"></i>
                                            <i class="fa fa-star star a" id="star-3"></i>
                                            <i class="fa fa-star star a" id="star-4"></i>
                                            <i class="fa fa-star star a" id="star-5"></i>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Accommodation</label>
                                            <input type="hidden" name="accommodation" id="accommodation">
                                            <input type="hidden" name="accommodation_value" id="accommodation_value" value="{{ $review->accommodation }}">
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
                                            <input type="hidden" name="pre_info" id="pre_info" value="0">
                                            <input type="hidden" name="pre_info_value" id="pre_info_value" value="{{ $review->pre_info }}">
                                            <i class="fa fa-star star c" id="star-1b"></i>
                                            <i class="fa fa-star star c" id="star-2b"></i>
                                            <i class="fa fa-star star c" id="star-3b"></i>
                                            <i class="fa fa-star star c" id="star-4b"></i>
                                            <i class="fa fa-star star c" id="star-5b"></i>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Transportation</label>
                                            <input type="hidden" name="transportation" id="transportation" value="0">
                                            <input type="hidden" name="transportation_value" id="transportation_value" value="{{ $review->transportation }}">
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
                                            <input type="hidden" name="staffs" id="staffs" value="0">
                                            <input type="hidden" name="staffs_value" id="staffs_value" value="{{ $review->staffs }}">
                                            <i class="fa fa-star star e" id="star-1d"></i>
                                            <i class="fa fa-star star e" id="star-2d"></i>
                                            <i class="fa fa-star star e" id="star-3d"></i>
                                            <i class="fa fa-star star e" id="star-4d"></i>
                                            <i class="fa fa-star star e" id="star-5d"></i>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Value for Money</label>
                                            <input type="hidden" name="money_value" id="money_value" value="0">
                                            <input type="hidden" name="money_value_value" id="money_value_value" value="{{ $review->money_value }}">
                                            <i class="fa fa-star star f" id="star-1e"></i>
                                            <i class="fa fa-star star f" id="star-2e"></i>
                                            <i class="fa fa-star star f" id="star-3e"></i>
                                            <i class="fa fa-star star f" id="star-4e"></i>
                                            <i class="fa fa-star star f" id="star-5e"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option @if($review->status =="published") selected @endif>published</option>
                                                <option @if($review->status =="unpublished") selected @endif>unpublished</option>
                                                <option @if($review->status =="trash") selected @endif>trash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                <button type="submit" class="btn btn-primary pull-right">Edit</button>
                                <div class="clearfix"></div>
                            </form>
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
                var value = $(('#meals_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1").addClass('star-checked1');
                        $('#meals').val(value);
                        break;
                    case "2":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $('#meals').val(value);
                        break;
                    case "3":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $("#star-3").addClass('star-checked1');
                        $('#meals').val(value);
                        break;
                    case "4":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $("#star-3").addClass('star-checked1');
                        $("#star-4").addClass('star-checked1');
                        $('#meals').val(value);
                        break;
                    case "5":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $("#star-3").addClass('star-checked1');
                        $("#star-4").addClass('star-checked1');
                        $("#star-5").addClass('star-checked1');
                        $('#meals').val(value);
                        break;
                }
            });

            $('.b').ready(function () {
                //get the id of star
                var value = $(('#accommodation_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1a").addClass('star-checked1');
                        $('#accommodation').val(value);
                        break;
                    case "2":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $('#accommodation').val(value);
                        break;
                    case "3":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $("#star-3a").addClass('star-checked1');
                        $('#accommodation').val(value);
                        break;
                    case "4":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $("#star-3a").addClass('star-checked1');
                        $("#star-4a").addClass('star-checked1');
                        $('#accommodation').val(value);
                        break;
                    case "5":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $("#star-3a").addClass('star-checked1');
                        $("#star-4a").addClass('star-checked1');
                        $("#star-5a").addClass('star-checked1');
                        $('#accommodation').val(value);
                        break;
                }
            });

            $('.c').ready(function () {
                //get the id of star
                var value = $(('#pre_info_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1b").addClass('star-checked1');
                        $('#pre_info').val(value);
                        break;
                    case "2":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $('#pre_info').val(value);
                        break;
                    case "3":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $("#star-3b").addClass('star-checked1');
                        $('#pre_info').val(value);
                        break;
                    case "4":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $("#star-3b").addClass('star-checked1');
                        $("#star-4b").addClass('star-checked1');
                        $('#pre_info').val(value);
                        break;
                    case "5":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $("#star-3b").addClass('star-checked1');
                        $("#star-4b").addClass('star-checked1');
                        $("#star-5b").addClass('star-checked1');
                        $('#pre_info').val(value);
                        break;
                }
            });

            $('.d').ready(function () {
                //get the id of star
                var value = $(('#transportation_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1c").addClass('star-checked1');
                        $('#transportation').val(value);
                        break;
                    case "2":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $('#transportation').val(value);
                        break;
                    case "3":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $("#star-3c").addClass('star-checked1');
                        $('#transportation').val(value);
                        break;
                    case "4":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $("#star-3c").addClass('star-checked1');
                        $("#star-4c").addClass('star-checked1');
                        $('#transportation').val(value);
                        break;
                    case "5":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $("#star-3c").addClass('star-checked1');
                        $("#star-4c").addClass('star-checked1');
                        $("#star-5c").addClass('star-checked1');
                        $('#transportation').val(value);
                        break;
                }
            });

            $('.e').ready(function () {
                //get the id of star
                var value = $(('#staffs_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1d").addClass('star-checked1');
                        $('#staffs').val(value);
                        break;
                    case "2":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $('#staffs').val(value);
                        break;
                    case "3":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $("#star-3d").addClass('star-checked1');
                        $('#staffs').val(value);
                        break;
                    case "4":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $("#star-3d").addClass('star-checked1');
                        $("#star-4d").addClass('star-checked1');
                        $('#staffs').val(value);
                        break;
                    case "5":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $("#star-3d").addClass('star-checked1');
                        $("#star-4d").addClass('star-checked1');
                        $("#star-5d").addClass('star-checked1');
                        $('#staffs').val(value);
                        break;
                }
            });

            $('.f').ready(function () {
                //get the id of star
                var value = $(('#money_value_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1e").addClass('star-checked1');
                        $('#money_value').val(value);
                        break;
                    case "2":

                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $('#money_value').val(value);
                        break;
                    case "3":
                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $("#star-3e").addClass('star-checked1');
                        $('#money_value').val(value);
                        break;
                    case "4":
                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $("#star-3e").addClass('star-checked1');
                        $("#star-4e").addClass('star-checked1');
                        $('#money_value').val(value);
                        break;
                    case "5":
                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $("#star-3e").addClass('star-checked1');
                        $("#star-4e").addClass('star-checked1');
                        $("#star-5e").addClass('star-checked1');
                        $('#money_value').val(value);
                        break;
                }
            });

            $('.g').ready(function () {
                //get the id of star
                var value = $(('#overall_value')).val();
                switch (value) {
                    case "1":
                        $("#star-1f").addClass('star-checked1');
                        $('#overall').val(value);
                        break;
                    case "2":

                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $('#overall').val(value);
                        break;
                    case "3":
                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $("#star-3f").addClass('star-checked1');
                        $('#overall').val(value);
                        break;
                    case "4":
                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $("#star-3f").addClass('star-checked1');
                        $("#star-4f").addClass('star-checked1');
                        $('#overall').val(value);
                        break;
                    case "5":
                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $("#star-3f").addClass('star-checked1');
                        $("#star-4f").addClass('star-checked1');
                        $("#star-5f").addClass('star-checked1');
                        $('#overall').val(value);
                        break;
                }
            });

            $('.a').hover(function () {
                //get the id of star
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1":
                        $("#star-1").addClass('star-checked');
                        break;
                    case "star-2":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        break;
                    case "star-3":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        $("#star-3").addClass('star-checked');
                        break;
                    case "star-4":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        $("#star-3").addClass('star-checked');
                        $("#star-4").addClass('star-checked');
                        break;
                    case "star-5":
                        $("#star-1").addClass('star-checked');
                        $("#star-2").addClass('star-checked');
                        $("#star-3").addClass('star-checked');
                        $("#star-4").addClass('star-checked');
                        $("#star-5").addClass('star-checked');
                        break;
                }
            }).mouseout(function () {
                //remove the star checked class when mouseout
                $('.a').removeClass('star-checked');
            });


            $('.a').click(function () {
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1":
                        $("#star-1").addClass('star-checked1');
                        $('#star-2').removeClass('star-checked1');
                        $('#star-3').removeClass('star-checked1');
                        $('#star-4').removeClass('star-checked1');
                        $('#star-5').removeClass('star-checked1');
                        $('#meals').val(1);
                        break;c
                    case "star-2":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $('#star-3').removeClass('star-checked1');
                        $('#star-4').removeClass('star-checked1');
                        $('#star-5').removeClass('star-checked1');
                        $('#meals').val(2);
                        break;
                    case "star-3":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $("#star-3").addClass('star-checked1');
                        $('#star-4').removeClass('star-checked1');
                        $('#star-5').removeClass('star-checked1');
                        $('#meals').val(3);
                        break;
                    case "star-4":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $("#star-3").addClass('star-checked1');
                        $("#star-4").addClass('star-checked1');
                        $('#star-5').removeClass('star-checked1');
                        $('#meals').val(4);
                        break;
                    case "star-5":
                        $("#star-1").addClass('star-checked1');
                        $("#star-2").addClass('star-checked1');
                        $("#star-3").addClass('star-checked1');
                        $("#star-4").addClass('star-checked1');
                        $("#star-5").addClass('star-checked1');
                        $('#meals').val(5);
                        break;
                }
            });

            $('.b').hover(function () {
                //get the id of star
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1a":
                        $("#star-1a").addClass('star-checked');
                        break;
                    case "star-2a":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        break;
                    case "star-3a":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        $("#star-3a").addClass('star-checked');
                        break;
                    case "star-4a":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        $("#star-3a").addClass('star-checked');
                        $("#star-4a").addClass('star-checked');
                        break;
                    case "star-5a":
                        $("#star-1a").addClass('star-checked');
                        $("#star-2a").addClass('star-checked');
                        $("#star-3a").addClass('star-checked');
                        $("#star-4a").addClass('star-checked');
                        $("#star-5a").addClass('star-checked');
                        break;
                }
            }).mouseout(function () {
                //remove the star checked class when mouseout
                $('.b').removeClass('star-checked');
            });


            $('.b').click(function () {
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1a":
                        $("#star-1a").addClass('star-checked1');
                        $('#star-2a').removeClass('star-checked1');
                        $('#star-3a').removeClass('star-checked1');
                        $('#star-4a').removeClass('star-checked1');
                        $('#star-5a').removeClass('star-checked1');
                        $('#accommodation').val(1);
                        break;
                    case "star-2a":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $('#star-3a').removeClass('star-checked1');
                        $('#star-4a').removeClass('star-checked1');
                        $('#star-5a').removeClass('star-checked1');
                        $('#accommodation').val(2);
                        break;
                    case "star-3a":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $("#star-3a").addClass('star-checked1');
                        $('#star-4a').removeClass('star-checked1');
                        $('#star-5a').removeClass('star-checked1');
                        $('#accommodation').val(3);
                        break;
                    case "star-4a":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $("#star-3a").addClass('star-checked1');
                        $("#star-4a").addClass('star-checked1');
                        $('#star-5a').removeClass('star-checked1');
                        $('#accommodation').val(4);
                        break;
                    case "star-5a":
                        $("#star-1a").addClass('star-checked1');
                        $("#star-2a").addClass('star-checked1');
                        $("#star-3a").addClass('star-checked1');
                        $("#star-4a").addClass('star-checked1');
                        $("#star-5a").addClass('star-checked1');
                        $('#accommodation').val(5);
                        break;
                }
            });

            $('.c').hover(function () {
                //get the id of star
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1b":
                        $("#star-1b").addClass('star-checked');
                        break;
                    case "star-2b":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        break;
                    case "star-3":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        $("#star-3b").addClass('star-checked');
                        break;
                    case "star-4b":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        $("#star-3b").addClass('star-checked');
                        $("#star-4b").addClass('star-checked');
                        break;
                    case "star-5b":
                        $("#star-1b").addClass('star-checked');
                        $("#star-2b").addClass('star-checked');
                        $("#star-3b").addClass('star-checked');
                        $("#star-4b").addClass('star-checked');
                        $("#star-5b").addClass('star-checked');
                        break;
                }
            }).mouseout(function () {
                //remove the star checked class when mouseout
                $('.c').removeClass('star-checked');
            });


            $('.c').click(function () {
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1b":
                        $("#star-1b").addClass('star-checked1');
                        $('#star-2b').removeClass('star-checked1');
                        $('#star-3b').removeClass('star-checked1');
                        $('#star-4b').removeClass('star-checked1');
                        $('#star-5b').removeClass('star-checked1');
                        $('#pre_info').val(1);
                        break;
                    case "star-2b":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $('#star-3b').removeClass('star-checked1');
                        $('#star-4b').removeClass('star-checked1');
                        $('#star-5b').removeClass('star-checked1');
                        $('#pre_info').val(2);
                        break;
                    case "star-3b":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $("#star-3b").addClass('star-checked1');
                        $('#star-4b').removeClass('star-checked1');
                        $('#star-5b').removeClass('star-checked1');
                        $('#pre_info').val(3);
                        break;
                    case "star-4b":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $("#star-3b").addClass('star-checked1');
                        $("#star-4b").addClass('star-checked1');
                        $('#star-5b').removeClass('star-checked1');
                        $('#pre_info').val(4);
                        break;
                    case "star-5b":
                        $("#star-1b").addClass('star-checked1');
                        $("#star-2b").addClass('star-checked1');
                        $("#star-3b").addClass('star-checked1');
                        $("#star-4b").addClass('star-checked1');
                        $("#star-5b").addClass('star-checked1');
                        $('#pre_info').val(5);
                        break;
                }
            });

            $('.d').hover(function () {
                //get the id of star
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1c":
                        $("#star-1c").addClass('star-checked');
                        break;
                    case "star-2c":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        break;
                    case "star-3c":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        $("#star-3c").addClass('star-checked');
                        break;
                    case "star-4c":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        $("#star-3c").addClass('star-checked');
                        $("#star-4c").addClass('star-checked');
                        break;
                    case "star-5c":
                        $("#star-1c").addClass('star-checked');
                        $("#star-2c").addClass('star-checked');
                        $("#star-3c").addClass('star-checked');
                        $("#star-4c").addClass('star-checked');
                        $("#star-5c").addClass('star-checked');
                        break;
                }
            }).mouseout(function () {
                //remove the star checked class when mouseout
                $('.d').removeClass('star-checked');
            });


            $('.d').click(function () {
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1c":
                        $("#star-1c").addClass('star-checked1');
                        $('#star-2c').removeClass('star-checked1');
                        $('#star-3c').removeClass('star-checked1');
                        $('#star-4c').removeClass('star-checked1');
                        $('#star-5c').removeClass('star-checked1');
                        $('#transportation').val(1);
                        break;
                    case "star-2c":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $('#star-3c').removeClass('star-checked1');
                        $('#star-4c').removeClass('star-checked1');
                        $('#star-5c').removeClass('star-checked1');
                        $('#transportation').val(2);
                        break;
                    case "star-3c":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $("#star-3c").addClass('star-checked1');
                        $('#star-4c').removeClass('star-checked1');
                        $('#star-5c').removeClass('star-checked1');
                        $('#transportation').val(3);
                        break;
                    case "star-4c":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $("#star-3c").addClass('star-checked1');
                        $("#star-4c").addClass('star-checked1');
                        $('#star-5c').removeClass('star-checked1');
                        $('#transportation').val(4);
                        break;
                    case "star-5c":
                        $("#star-1c").addClass('star-checked1');
                        $("#star-2c").addClass('star-checked1');
                        $("#star-3c").addClass('star-checked1');
                        $("#star-4c").addClass('star-checked1');
                        $("#star-5c").addClass('star-checked1');
                        $('#transportation').val(5);
                        break;
                }
            });

            $('.e').hover(function () {
                //get the id of star
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1d":
                        $("#star-1d").addClass('star-checked');
                        break;
                    case "star-2d":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        break;
                    case "star-3d":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        $("#star-3d").addClass('star-checked');
                        break;
                    case "star-4d":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        $("#star-3d").addClass('star-checked');
                        $("#star-4d").addClass('star-checked');
                        break;
                    case "star-5d":
                        $("#star-1d").addClass('star-checked');
                        $("#star-2d").addClass('star-checked');
                        $("#star-3d").addClass('star-checked');
                        $("#star-4d").addClass('star-checked');
                        $("#star-5d").addClass('star-checked');
                        break;
                }
            }).mouseout(function () {
                //remove the star checked class when mouseout
                $('.e').removeClass('star-checked');
            });


            $('.e').click(function () {
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1d":
                        $("#star-1d").addClass('star-checked1');
                        $('#star-2d').removeClass('star-checked1');
                        $('#star-3d').removeClass('star-checked1');
                        $('#star-4d').removeClass('star-checked1');
                        $('#star-5d').removeClass('star-checked1');
                        $('#staffs').val(1);
                        break;
                    case "star-2d":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $('#star-3d').removeClass('star-checked1');
                        $('#star-4d').removeClass('star-checked1');
                        $('#star-5d').removeClass('star-checked1');
                        $('#staffs').val(2);
                        break;
                    case "star-3d":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $("#star-3d").addClass('star-checked1');
                        $('#star-4d').removeClass('star-checked1');
                        $('#star-5d').removeClass('star-checked1');
                        $('#staffs').val(3);
                        break;
                    case "star-4d":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $("#star-3d").addClass('star-checked1');
                        $("#star-4d").addClass('star-checked1');
                        $('#star-5d').removeClass('star-checked1');
                        $('#staffs').val(4);
                        break;
                    case "star-5d":
                        $("#star-1d").addClass('star-checked1');
                        $("#star-2d").addClass('star-checked1');
                        $("#star-3d").addClass('star-checked1');
                        $("#star-4d").addClass('star-checked1');
                        $("#star-5d").addClass('star-checked1');
                        $('#staffs').val(5);
                        break;
                }
            });

            $('.f').hover(function () {
                //get the id of star
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1e":
                        $("#star-1e").addClass('star-checked');
                        break;
                    case "star-2":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        break;
                    case "star-3e":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        $("#star-3e").addClass('star-checked');
                        break;
                    case "star-4e":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        $("#star-3e").addClass('star-checked');
                        $("#star-4e").addClass('star-checked');
                        break;
                    case "star-5e":
                        $("#star-1e").addClass('star-checked');
                        $("#star-2e").addClass('star-checked');
                        $("#star-3e").addClass('star-checked');
                        $("#star-4e").addClass('star-checked');
                        $("#star-5e").addClass('star-checked');
                        break;
                }
            }).mouseout(function () {
                //remove the star checked class when mouseout
                $('.f').removeClass('star-checked');
            });


            $('.f').click(function () {
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1e":
                        $("#star-1e").addClass('star-checked1');
                        $('#star-2e').removeClass('star-checked1');
                        $('#star-3e').removeClass('star-checked1');
                        $('#star-4e').removeClass('star-checked1');
                        $('#star-5e').removeClass('star-checked1');
                        $('#money_value').val(1);
                        break;
                    case "star-2e":
                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $('#star-3e').removeClass('star-checked1');
                        $('#star-4e').removeClass('star-checked1');
                        $('#star-5e').removeClass('star-checked1');
                        $('#money_value').val(2);
                        break;
                    case "star-3e":
                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $("#star-3e").addClass('star-checked1');
                        $('#star-4e').removeClass('star-checked1');
                        $('#star-5e').removeClass('star-checked1');
                        $('#money_value').val(3);
                        break;
                    case "star-4e":
                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $("#star-3e").addClass('star-checked1');
                        $("#star-4e").addClass('star-checked1');
                        $('#star-5e').removeClass('star-checked1');
                        $('#money_value').val(4);
                        break;
                    case "star-5e":
                        $("#star-1e").addClass('star-checked1');
                        $("#star-2e").addClass('star-checked1');
                        $("#star-3e").addClass('star-checked1');
                        $("#star-4e").addClass('star-checked1');
                        $("#star-5e").addClass('star-checked1');
                        $('#money_value').val(5);
                        break;
                }
            });

            $('.g').hover(function () {
                //get the id of star
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1f":
                        $("#star-1f").addClass('star-checked');
                        break;
                    case "star-2f":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        break;
                    case "star-3f":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        $("#star-3f").addClass('star-checked');
                        break;
                    case "star-4f":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        $("#star-3f").addClass('star-checked');
                        $("#star-4f").addClass('star-checked');
                        break;
                    case "star-5f":
                        $("#star-1f").addClass('star-checked');
                        $("#star-2f").addClass('star-checked');
                        $("#star-3f").addClass('star-checked');
                        $("#star-4f").addClass('star-checked');
                        $("#star-5f").addClass('star-checked');
                        break;
                }
            }).mouseout(function () {
                //remove the star checked class when mouseout
                $('.g').removeClass('star-checked');
            });


            $('.g').click(function () {
                var star_id = $(this).attr('id');
                switch (star_id) {
                    case "star-1f":
                        $("#star-1f").addClass('star-checked1');
                        $('#star-2f').removeClass('star-checked1');
                        $('#star-3f').removeClass('star-checked1');
                        $('#star-4f').removeClass('star-checked1');
                        $('#star-5f').removeClass('star-checked1');
                        $('#overall').val(1);
                        break;
                    case "star-2f":
                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $('#star-3f').removeClass('star-checked1');
                        $('#star-4f').removeClass('star-checked1');
                        $('#star-5f').removeClass('star-checked1');
                        $('#overall').val(2);
                        break;
                    case "star-3f":
                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $("#star-3f").addClass('star-checked1');
                        $('#star-4f').removeClass('star-checked1');
                        $('#star-5f').removeClass('star-checked1');
                        $('#overall').val(3);
                        break;
                    case "star-4f":
                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $("#star-3f").addClass('star-checked1');
                        $("#star-4f").addClass('star-checked1');
                        $('#star-5f').removeClass('star-checked1');
                        $('#overall').val(4);
                        break;
                    case "star-5f":
                        $("#star-1f").addClass('star-checked1');
                        $("#star-2f").addClass('star-checked1');
                        $("#star-3f").addClass('star-checked1');
                        $("#star-4f").addClass('star-checked1');
                        $("#star-5f").addClass('star-checked1');
                        $('#overall').val(5);
                        break;
                }
            });
        });
    </script>
@endsection
