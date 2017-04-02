<!--Trip Information Start-->
<div class="trip-information details-two">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="trip-info-left-text">
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
                        <li class=""><span>Cost</span>${{  $itinerary->cost }}</li>
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
                            <div class="trip-level-content">
                                <img src="../img/icon/level1.png" alt="">
                                <h4>Easy</h4>
                            </div>
                            <div class="trip-level-content">
                                <img src="../img/icon/level2.png" alt="">
                                <h4>Medium</h4>
                            </div>
                            <div class="trip-level-content">
                                <img src="../img/icon/level3.png" alt="">
                                <h4>hard</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row divider"></div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="trip-text-container">
                                <h2>Rating</h2>
                                <div class="trip-rating">
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star grey"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <p>15 <span>reviews</span></p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="trip-text-container">
                                <h2>Duration</h2>
                                <h3>10 Days</h3>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="trip-text-container budget">
                                <h2>Budget</h2>
                                <h1>$659</h1>
                                <p>per person</p>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button id="booking-button" type="submit">Book this trip</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Trip Information-->