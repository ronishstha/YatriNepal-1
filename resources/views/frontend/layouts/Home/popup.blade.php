<div class="container">
    <div class="row">
        <!-- popup box modal starts here -->
        <div class="modal fade demo-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h3 class="modal-title">Any questions??</h3>
                    </div>
                    <div class="modal-body">
                        <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
                        <div class="container">
                            <div class="row">
                                <form class="form-box"  style="width: 100%" role="form" method="POST" id="contact" action="{{ route('web-register-post') }}">
                                    {!! csrf_field() !!}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input type="text" style="width:300px" class="form-control" name="name" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>E-Mail Address</label>
                                        <input type="email" style="width:300px" class="form-control" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea style="width:300px" class="form-control" name="msg"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" style="width:300px" class="form-control" name="country" required>
                                        <input type="hidden" name="currentItinerary" value="{{ $itinerary->slug }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No.</label>
                                        <input type="tel" style="width:300px" class="form-control" name="contact" required>
                                    </div>
                                    <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                                        <label>Captcha</label>
                                        {!! captcha_image_html('ContactCaptcha') !!}
                                        <input class="form-control" style="width:300px" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;" required>
                                        @if ($errors->has('CaptchaCode'))
                                            <span class="help-block">
                                <strong>{{ $errors->first('CaptchaCode') }}</strong>
                                   </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-->
        <!-- popup box modal ends -->
     <!-- /.container -->

<div class="customize-box alert alert-info">
    <h4>Not really satisfied with this itinerary ? Make your own ...<button data-toggle="modal" data-target=".demo-popup" class="btn btn-info" style="margin-left:510px;width:150px" id="onclick">Customize</button> </h4>
</div>
<div class="clearfix"></div>
