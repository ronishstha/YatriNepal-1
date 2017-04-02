<!--Slider Area Start-->
<div class="slider-area home-two-slider">
    <div class="preview-2">
        <div id="nivoslider" class="slides">
            @foreach($banners as $banner)
                <img src="{{ URL::asset('banner/'.$banner->image) }}" alt="" class="img-responsive" style="border-radius: 2px;" title="#slider-1-caption1" >
            @endforeach
            @if($banners->isEmpty())
                <a href="#"><img src="img/slider/slider-3.jpg" alt="" title="#slider-1-caption1"/></a>
                <a href="#"><img src="img/slider/slider-4.jpg" alt="" title="#slider-1-caption1"/></a>
            @endif
        </div>
        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content">
                                <h1 class="title1">HIKING &amp; CAMPING</h1>
                                <h1 class="title2 hidden-xs">GEAR STYLES</h1>
                                <h2 class="sub-title">The right tour for the</h2>
                                <h2 class="sub-title">right <span>traveller</span></h2>
                                <form action="{{ route('searchItinerary') }}" id="banner-searchbox" class="hidden-xs">
                                    <div class="adventure-cat">
                                        <select name="activity" class="search-adventure" >
                                                <option value="">Select Activity</option>
                                                @foreach($activities as $activity)
                                                    <option>{{ $activity->title }}</option>
                                                @endforeach
                                        </select>
                                        <button type="submit" id="btn-search-category" >Search</button>
                                    </div>
                                    <div class="adventure-cat destination">
                                        <select name="destination" class="search-adventure" >
                                            <option value="">Select Your Destination</option>
                                            @foreach($destination as $dest)
                                                <option>{{ $dest->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--End of Slider Area-->