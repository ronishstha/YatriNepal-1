<!--Banner Area Start-->
<div class="banner-area contact-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                    <div class="customize-box alert alert-info viewSuccess" id="viewSuccess" style="color:green">
                        <h3 id="viewSuccess" class="viewSuccess">Your queries have been submitted!!</h3>
                    </div>
                @endif
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Contact <span>Us</span></h1>
                    </div>
                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui<br> id, convallis iaculis eros. Praesent porta lacinia elementum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End of Banner Area-->