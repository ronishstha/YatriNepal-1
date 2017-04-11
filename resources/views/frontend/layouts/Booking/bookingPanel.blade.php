<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />

<link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png" />
<link rel="icon" type="image/png" href="../img/favicon.png" />

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

<link href="../css/material-bootstrap-wizard.css" rel="stylesheet" />
<!-- CSS Files -->

<div class="image-container set-full-height" style="background-image: url('../img/wizard-book.jpg')">

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--      Wizard container        -->
                <div class="wizard-container" style="margin-top: 100px">
                    <div class="card wizard-card" data-color="purple" id="wizard">
                        <form method="POST" action="{{ route('booked') }}">
                            <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                            {!! csrf_field() !!}

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    <button class="btn-info" style="position:absolute; left:20px ; font-size:20px; border-radius:5px" title="Previous Page" onclick="goBack()">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    </button>
                                    <script>
                                        function goBack() {
                                            window.history.back();
                                        }
                                    </script>
                                    Booking !!!
                                </h3>
                                <h5>Please Provide the information needed.</h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#details" data-toggle="tab">Select a Trip</a></li>
                                    <li><a href="#captain" data-toggle="tab">Submit Traveler's Info</a></li>
                                    {{--<li><a href="#description" data-toggle="tab">Send Payment</a></li>--}}
                                </ul>
                            </div>

                            <div class="tab-content">
                            <div class="tab-pane" id="details">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text">Process Booking Now </h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Enter number of Travellers</label>
                                            <input name="travelnumber" type="text" class="form-control no_travel" required>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nationality</label>
                                            <select class="form-control" required>
                                                <option disabled="" selected=""></option>
                                                option value="USA">USA &amp; Canada</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Australia">Australia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="European Union">European Union</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Other International">Other International</option>
                                                <option value="...">...</option>
                                            </select>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Trip Name</label>
                                            <select class="form-control itinerary" name="tripname" required>
                                                <option disabled="" selected=""></option>
                                                @foreach($itinerary as $itinerary)
                                                    <option value="{{ $itinerary->id }}">{{ $itinerary->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating ">
                                            <label >Trip Start Date</label>
                                            <input name="tripdate" type="date" class="form-control start_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="captain">

                            </div>

                            <div class="tab-pane" id="description">
                                    <div class="row">
                                        <h4 class="info-text"> Drop us a small description.</h4>
                                        <div class="col-sm-6 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Room description</label>
                                                <textarea class="form-control" placeholder="" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Example</label>
                                                <p class="description">"The room really nice name is recognized as being a really awesome room. We use it every sunday when we go fishing and we catch a lot. It has some kind of magic shield around it."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd submit_form' id="next" name='next' value='Next' />
                                    <button type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish'>Submit</button>
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />


                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
             <i class="fa fa-heart heart"></i></a>
        </div>
    </div>
</div>

{{--<script type="text/javascript">--}}
{{--$('#next').click(function () {--}}
    {{--var number = $(('.travelnumber').val())--}}
    {{--var tripname = $(('.tripname').val())--}}
{{--});--}}



{{--</script>--}}