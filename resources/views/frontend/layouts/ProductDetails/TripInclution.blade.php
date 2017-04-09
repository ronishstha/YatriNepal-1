<!--Trip Inclution Start-->
<div class="trip-inclution section-padding"  style="background:url(../img/bg.png)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Trip <span>Inclusions</span></h1>
                    </div>
                    <div class="imglist" style="text-align: left">
                        {!! $itinerary->cost_inclusive !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Trip <span>Exclusions</span></h1>
                    </div>
                    <div class="imglist" style="text-align: left">
                        {!! $itinerary->cost_exclusive !!}
                    </div>
                </div>
            </div>
        </div>
        @include('frontend.layouts.Home.popup')
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1><span>Itinerary</span></h1>
                    </div>
                    <div class="imglist" style="text-align: left">
                        {!! $itinerary->itinerary !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Important <span>note</span></h1>
                    </div>
                    <div class="imglist" style="text-align: left">
                        {!! $itinerary->important_note !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Trekking <span>Group</span></h1>
                    </div>
                    <div class="imglist" style="text-align: left">
                        {!! $itinerary->trekking_group !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Trip Inclution-->
