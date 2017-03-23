<!--Slider Area Start-->
<div class="slider-area home-two-slider">
    <div class="preview-2">
        <div id="nivoslider" class="slides">

            @foreach($banners as $banner)
                <a href="#"><img src="{{ $banner->image }}" alt="" title="#slider-1-caption1"/></a>
            @endforeach

            @forif($banners->isEmpty())
                <a href="#"><img src="img/slider/slider-3.jpg" alt="" title="#slider-1-caption1"/></a>
                <a href="#"><img src="img/slider/slider-4.jpg" alt="" title="#slider-1-caption1"/></a>
            @endforif

        </div>
        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content">
                 git
                                <h1 class="title1">HIKING &amp; CAMPING</h1>
                                <h1 class="title2 hidden-xs">GEAR STYLES</h1>
                                <h2 class="sub-title">The right tour for the</h2>
                                <h2 class="sub-title">right <span>traveller</span></h2>
                                <form action="#" id="banner-searchbox" class="hidden-xs">
                                    <div class="adventure-cat">
                                        <select name="category" class="search-adventure">
                                                <option>Select Adventure</option>
                                                @foreach($activities as $activity)
                                                    <option>{{ $activity->title }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="adventure-cat destination">
                                        <select name="destination" class="search-adventure">
                                            <option>Select Your Destination</option>
                                            @foreach($destination as $dest)
                                                <option>{{ $dest->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="adventure-cat floatright">
                                        <input type="date" name="date" class="search-adventure" placeholder="Select Date"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="submit" id="btn-search-category" class="button-yellow">SEARCH</button>
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