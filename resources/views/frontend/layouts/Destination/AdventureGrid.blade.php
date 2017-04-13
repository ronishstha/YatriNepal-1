<!--Adventures Grid Start-->
<div class="adventures-grid section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shop-item-filter">
                    <form action="{{ route('searchDest') }}" id="banner-searchbox">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="adventure-cat">
                                    <select name="activity" class="search-adventure">
                                        <option value="select">Select Activities</option>
                                            @foreach($activities as $activities)
                                                <option>{{ $activities->title }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="adventure-cat">
                                    <select name="destination" class="search-adventure">
                                        <option value="select">Select Your Destination</option>
                                        @foreach($destination as $destination)
                                            <option>{{ $destination->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 hidden-sm">
                                <div class="adventure-cat">
                                    <select name="price" class="search-adventure">
                                        <option value="select">Price</option>
                                        <option>$5000</option>
                                        <option>$8000</option>
                                        <option>$10000</option>
                                        <option>$12000</option>
                                        <option>$14000</option>
                                        <option>$16000</option>
                                        <option>$18000</option>
                                        <option>$20000</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-2 hidden-sm">
                                <button type="submit" id="btn-search-category" style="margin-top:0px; background: rgba(0, 0, 0, 0.68)">Search</button>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="adventure-tab clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs navbar-left">
                                        <li><a class="grid-view" href="shop-grid-no-sidebar.html">Shop Grid No Sidebar</a></li>
                                        <li><a class="list-view" href="shop-grid-with-sidebar.html" >Shop Grid Sidebar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
            @foreach($itinerary as $itinerary)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-adventure">
                        <a href="{{ route('details',['slug'=>$itinerary->slug]) }}"><img src="img/adventure-list/1.jpg" alt=""></a>
                        <div class="adventure-text effect-bottom">
                            <div class="transparent-overlay">
                                <h4><a href="{{ route('details',['slug'=>$itinerary->slug]) }}">{{ $itinerary->title }} | <span>{{ $itinerary->country->title }}</span></a></h4>
                                <span class="trip-time"><i class="fa fa-clock-o"></i>{{ $itinerary->trip_duration }} Trip</span>
                                <span class="trip-level"><i class="fa fa-send-o"></i>Level: {{ $itinerary->trekking_grade }}</span>
                                <p> {{ str_limit($itinerary->trip_introduction, $limit = 140, $end = '...') }}</p>
                            </div>
                            <div class="adventure-price-link">
                                <span class="trip-price">${{ $itinerary->cost }}&nbsp;</span>
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

        <div class="row">
            <div class="col-md-12">
                <div class="pagination-content">
                    <div class="pagination-button">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="current"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--End of Adventures Grid-->