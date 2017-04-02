<!--Portfolio Area Start-->
<div class="portfolio-area portfolio-two">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title title-two text-center">
                    <div class="title-border">
                        <h1>Browse by <span>Hiking &amp; Camping</span></h1>
                    </div>
                    <p>Everyone loves to travel, but not everyone loves to travel the same way. G Adventures Travel Styles gather trips of a feather<br> together so you can spend less time searching and more time dreaming about where you’ll go.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($itinerary as $itinerary)
                <div class="col-md-3 col-sm-4">
                    <div class="single-portfolio">
                        <a href="#"><img src="img/portfolio/9.jpg" alt=""></a>
                        <div class="portfolio-text effect-bottom">
                            <h4><a href="{{ route('details', ['slug' => $itinerary->slug]) }}">{{ $itinerary->title }}</a></h4>
                            <p> {{ str_limit($itinerary->trip_introduction, $limit = 68, $end = '...') }}</p>
                            <div class="portfolio-link">
                                <a href="#"><i class="fa fa-facebook-f"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
       </div>
    </div>
</div>


<!--End of Portfolio Area-->