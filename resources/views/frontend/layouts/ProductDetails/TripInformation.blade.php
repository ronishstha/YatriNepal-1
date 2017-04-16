<!--Trip Information Start-->
<div class="trip-information details-two">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @if(session()->has('successBooking'))
                <div class="customize-box alert alert-info" style="color:green">
                    <h2>Successfully Booked!!</h2>
                    <p>Thank you for your business! Your Booking Form has been forwarded to our Operations Team who will email your “Welcome Packet” within 24 – 48 hours. This packet will contain all the details surrounding your program including deposit, insurance, medical, packing, Visa, and all other logistical details. Important to note that we will need to get your flight and insurance information as soon as possible.</p>
                    <p>Please finalize your reservation by submitting your minimum deposit payment. We will confirm your payments as soon as they are processed by our bank.</p>
                    <h3>Required Minimum Deposit Payment:</h3>
                    <p>A deposit of 25% (minimum per person) of the total amount owed needs to be paid within 10 days to reserve your spot(s) on your trip.</p>
                    <h3>Remaining Balance:</h3>
                    <p>The remaining balance must be paid at least 30 days prior to the start of your program. All payments will need to made payable in USD to HGTA. We accept Check, Certified Check, Bank Transfer, Wire Transfer or Credit Card. Please note there will be a 4% fee applied to all credit card payments and any wire fees associated with a payment will be the responsibility of the client. If you require any assistance or would like to submit your payment via Credit Card or Wire Transfer, please contact us at: Phone:704-200-7512</p>
                    <p>Email:<a href="#">askus@yatrinepal.com</a></p>
                    <h3>Mailing Address :</h3>
                    <p>Attn: Director of Operations</p>
                    <p>P.O. Box 44600</p>
                    <p>Thamel,Kathmandu</p>
                </div>

            @elseif(session()->has('failBooking'))
                <div class="customize-box alert alert-info" style="color:red">
                    <h2>Booking Failed</h2>
                    <p>Sorry your booking cannot be done due to some problems.Please review your information and try again.</p>
                    <p>Contact us if the problem persists</p>
                </div>

            @elseif(session()->has('failMail'))
                <div class="customize-box alert alert-info" style="color:green">
                    <h2>Booking Failed</h2>
                    <p>Your booking has been successfully done ...</p>
                    <p>If you do not receive the email please feel free to contact us. Our support will call u shortly</p>
                </div>
            @endif
            </div>
            <div class="col-md-6">
                <div class="trip-info-left-text">

                    @if(session()->has('success'))
                    {{--<div class="modal fade demo-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">--}}
                        {{--<div class="modal-dialog">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h3 class="modal-title">Message</h3>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    <div class="customize-box alert alert-info" style="color:green">
                                        {{ session('success') }}
                                    </div>
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    @endif
                    @if(count($errors)>0)
                        {{--<div class="modal fade demo-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">--}}
                            {{--<div class="modal-dialog">--}}
                                {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h3 class="modal-title">Message</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        <div class="customize-box alert alert-danger" style="color:red">
                                            <p>Your queries couldnt be submitted due to following.Please try again</p>
                                            <div class="imglist" style="text-align: left">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    @endif
                        @if(session()->has('failure'))
                            {{--<div class="modal fade demo-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">--}}
                                {{--<div class="modal-dialog">--}}
                                    {{--<div class="modal-content">--}}
                                        {{--<div class="modal-header">--}}
                                            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h3 class="modal-title">Message</h3>--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-body">--}}
                                            <div class="customize-box alert alert-danger" style="color:red">
                                                {{ session('failure') }}
                                            </div>
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        @endif

                    <div class="section-title text-center">
                        <div class="title-border">
                            <h1>Trip <span>Overview</span></h1>
                        </div>
                        <p style="font-size:14px;">{{ $itinerary->trip_introduction }}</p>
                    </div>
                    <div class="clearfix"></div>
                    <ul class="details-info">
                        <li class=""><span>Start-End</span>{{  $itinerary->start_end }}</li>
                        <li class=""><span>Group size</span>{{  $itinerary->group_size }}</li>
                        <li class=""><span>Trek Duration</span>{{  $itinerary->trekking_duration }}</li>
                        <li class=""><span>Trek Grade</span>{{  $itinerary->trekking_grade }}</li>
                        <li class=""><span>Max Altitude</span>{{  $itinerary->max_altitude }}</li>
                        <li class=""><span>Best Time</span>{{  $itinerary->best_time }}</li>
                        <li class=""><span>Departure</span>{{  $itinerary->departure }}</li>
                        <li class=""><span>Arrival</span>{{  $itinerary->arrival }}</li>

                    </ul>
                    <div class="details-social-link">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 hidden-sm hidden-xs">
                <div class="trip-booking-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Activities</h2>
                            <div class="single-trip-content">
                                <div class="trip-icon">
                                    <img src="../img/icon/41.png" alt="">
                                </div>
                                <h4>Camping</h4>
                            </div>
                            <div class="single-trip-content">
                                <div class="trip-icon">
                                    <img src="../img/icon/42.png" alt="">
                                </div>
                                <h4>Hiking</h4>
                            </div>
                            <div class="single-trip-content">
                                <div class="trip-icon">
                                    <img src="../img/icon/43.png" alt="">
                                </div>
                                <h4>Camping</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2>Activity Level</h2>
                            @if($itinerary->trekking_grade == 'easy')
                            <div class="trip-level-content">
                                <img src="../img/icon/level1.png" alt="">
                                <h4>Easy</h4>
                            </div>
                            @elseif($itinerary->trekking_grade == 'medium')
                            <div class="trip-level-content">
                                <img src="../img/icon/level2.png" alt="">
                                <h4>Medium</h4>
                            </div>
                            @elseif($itinerary->trekking_grade == "hard")
                            <div class="trip-level-content">
                                <img src="../img/icon/level3.png" alt="">
                                <h4>hard</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row divider"></div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="trip-text-container">
                                <h2>Rating</h2>
                                @php $mainRating = round($overall/$count);

                                @endphp
                                <div class="trip-rating">
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star-o"></i>
                                <div class="trip-rating" >
                                    @if($average == 1)
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                    @elseif($average == 2)
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                    @elseif($average == 3)
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    @elseif($average == 4)
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"></i>
                                    @else
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                        <i class="fa fa-star grey"style="color:yellow"></i>
                                    @endif

                                </div>
                                <p style="font-size: 20px"><b><span style="font-size: 30px">{{ count($rating) }}</span></b><span>reviews</span></p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="trip-text-container">
                                <h2>Duration</h2>
                                <h1>{{ $itinerary->trip_duration }}</h1>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="trip-text-container budget">
                                <h2>Budget</h2>
                                <h1>${{ $itinerary->cost }}</h1>
                                <p>per person</p>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="{{ route('booking') }}" class="btn btn-info" id="booking-button" type="submit">Book this trip</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Trip Information-->