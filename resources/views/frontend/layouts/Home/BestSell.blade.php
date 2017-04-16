<!--Best Sell Area Start-->
<div class="best-sell-area section-padding best-sell-two">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title title-two text-center">
                    <div class="title-border">
                        <h1>Best <span>Selling Trips</span></h1>
                    </div>
                    <p>Not sure what you’re looking for and need a little inspiration? We can help. Check out our handpicked <br>lists of topical trips you can take right now.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="sell-text-container">
                    <div class="title-container">
                        <h3>Day hike</h3>
                        <div class="best-sell-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                    <P>Get closer to nature. From the jungles of India to the African bush, our small group tours take you to the heart of nature. From elephants silhouetted against an Africa sunset to orangutans swinging in the treetops.....</P>
                    <a href="#" class="button-one button-yellow">VIew trip</a>
                </div>
                <div class="row">
                    <div class="best-sell-slider carousel-style-one">
                        @foreach($bestSell->chunk(2) as $bestSellChunk)
                        <div class="col-md-3">
                            @foreach($bestSellChunk as $bestSells)
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="{{ route('details',['slug'=>$bestSells->slug]) }}">
                                        <img src="img/sell/6.jpg" alt="">
                                        <span>{{ $bestSells->title }}</span>
                                    </a>
                                </div>
                            </div>
                          @endforeach
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 hidden-sm">
                <img src="img/sell/10.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!--End of Best Sell Area-->