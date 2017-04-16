<div class="trip-pricing-area section-padding" style="background-image: none">
    <h1>Customer Reviews</h1>
@foreach($rating as $rating)
    <div class="container" style="margin-top: 15px;padding-top: 10px;">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <div class="trip-rating">
                    <i class="fa fa-use" aria-hidden="true"></i>
                    <div class="trip-rating">
                        @if($rating->overall == 1)
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey"></i>
                            <i class="fa fa-star grey"></i>
                            <i class="fa fa-star grey"></i>
                            <i class="fa fa-star grey"></i>
                        @elseif($rating->overall == 2)
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey"></i>
                            <i class="fa fa-star grey"></i>
                            <i class="fa fa-star grey"></i>
                        @elseif($rating->overall == 3)
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        @elseif($rating->overall == 4)
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey"></i>
                        @else
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                            <i class="fa fa-star grey" style="color:yellow"></i>
                        @endif

                    </div>
                    <p>{{ date('F d, Y', strtotime($rating->created_at)) }}</p>
                    <p>{{ $rating->name }}</p>
                </div>
            </div>
            <div class="col-md-10" style="border: 1.5px #F0F0E0 solid;border-radius: 8px;padding-bottom: 10px;padding-top:10px">
                <div class="container">
                <div class="col-md-3">
                    <p>Accomodation</p>
                    @for($i=0;$i<($rating->accommodation);$i++)
                        <i class="fa fa-star grey" style="color:yellow"></i>
                    @endfor
                    <p>Transportation</p>
                    @for($i=0;$i<($rating->transportation);$i++)
                        <i class="fa fa-star grey" style="color:yellow"></i>
                    @endfor
                    <p>Pre Info</p>
                    @for($i=0;$i<($rating->pre_info);$i++)
                        <i class="fa fa-star grey" style="color:yellow"></i>
                    @endfor
                </div>
                <div class="col-md-3">
                    <p>Meals</p>
                    @for($i=0;$i<($rating->meals);$i++)
                        <i class="fa fa-star grey" style="color:yellow"></i>
                    @endfor
                    <p>Staffs</p>
                    @for($i=0;$i<($rating->staffs);$i++)
                        <i class="fa fa-star grey" style="color:yellow"></i>
                    @endfor
                    <p>Money Value</p>
                    @for($i=0;$i<($rating->money_value);$i++)
                        <i class="fa fa-star grey" style="color:yellow"></i>
                    @endfor
                </div>
                </div>
                <hr/>
                {!! $rating->description  !!}
            </div>
        </div>
    </div>
@endforeach
</div>





