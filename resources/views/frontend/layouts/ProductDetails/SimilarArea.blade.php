<!--Similar Area Start-->
<div class="similar-area section-grey section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Similar <span>Trips</span></h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui<br> id, convallis iaculis eros. Praesent porta lacinia elementum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach( $similar_itinerary as $similar_itinerary)
                <div class="col-md-4 col-sm-6">
                <div class="single-adventure no-margin">
                    <a href="{{ route('details', ['slug' => $similar_itinerary->slug]) }}"><img alt="" src="../img/adventure-list/8.jpg"></a>
                    <div class="adventure-text effect-bottom">
                        <div class="transparent-overlay">
                            <h4><a href="{{ route('details', ['slug' => $similar_itinerary->slug]) }}">{{  $similar_itinerary->title }} | <span>{{  $similar_itinerary->country->title }}</span></a></h4>
                            <span class="trip-time"><i class="fa fa-clock-o"></i>{{  $similar_itinerary->trip_duration }}Trip</span>
                            <span class="trip-level"><i class="fa fa-send-o"></i>Level: {{  $similar_itinerary->trekking_grade }}</span>
                            {{--<p>Lorem ipsum  dolor sit amet, consectetur adipiscing elit. Ut ornare ut est in molestie. Vestibulum convallis congue velit, et facilisis lorem efficitur et. Morbi vitae pellentesque nulla. </p>--}}
                        </div>
                        <div class="adventure-price-link">
                            <span class="trip-price">${{ $similar_itinerary->cost }}</span>
                            <span class="trip-person">&nbsp;&nbsp;Per Person</span>
                            <div class="adventure-link">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--End of Similar Area-->