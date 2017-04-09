<header class="fixed">
    {{--<div class="header-top">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4 col-sm-6 hidden-xs">--}}
                    {{--<div class="currency-language">--}}
                        {{--<div class="currency-menu">--}}
                            {{--<ul>--}}
                                {{--<li><a href="#">USD <i class="fa fa-angle-down"></i></a>--}}
                                    {{--<ul class="currency-dropdown">--}}
                                        {{--<li><a href="#">EUR</a></li>--}}
                                        {{--<li><a href="#">USD</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="language-menu">--}}
                            {{--<ul>--}}
                                {{--<li><a href="#">English <i class="fa fa-angle-down"></i></a>--}}
                                    {{--<ul class="language-dropdown">--}}
                                        {{--<li><a href="#">Nepali</a></li>--}}
                                        {{--<li><a href="#">English</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-8 col-sm-6 col-xs-12">--}}
                    {{--<div class="header-top-right">--}}
                        {{--<div class="login">--}}
                            {{--<a href="#"><i class="fa fa-pencil-square-o"></i>Register</a>--}}
                        {{--</div>--}}
                        {{--<div class="account">--}}
                            {{--<a href="signin.html"><i class="fa fa-lock"></i>sign In</a>--}}
                        {{--</div>--}}
                        {{--<ul class="header-r-cart">--}}
                            {{--<li><a href="#" class="cart"><i class="fa fa-shopping-cart"></i>(2)</a>--}}
                                {{--<div class="mini-cart-content">--}}
                                    {{--<div class="cart-products-list">--}}
                                        {{--<div class="cart-products">--}}
                                            {{--<div class="cart-image">--}}
                                                {{--<a href="#"><img alt="" src="img/cart/1.jpg"></a>--}}
                                            {{--</div>--}}
                                            {{--<div class="cart-product-info">--}}
                                                {{--<a class="product-name" href="#">alteration</a>--}}
                                                {{--<span class="quantity">X 1 -</span>--}}
                                                {{--<span class="p-price">$23.87</span>--}}
                                                {{--<a class="remove-product"><i class="fa fa-times-circle"></i></a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="cart-products">--}}
                                            {{--<div class="cart-image">--}}
                                                {{--<a href="#"><img alt="" src="img/cart/2.jpg"></a>--}}
                                            {{--</div>--}}
                                            {{--<div class="cart-product-info">--}}
                                                {{--<a class="product-name" href="#">alteration</a>--}}
                                                {{--<span class="quantity">X 1 -</span>--}}
                                                {{--<span class="p-price">$332.28</span>--}}
                                                {{--<a class="remove-product"><i class="fa fa-times-circle"></i></a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cart-price-list">--}}
                                        {{--<p class="price-amount">Sub-Total : <span>$293.73</span> </p>--}}
                                        {{--<p class="price-amount">Total : <span>$356.15</span> </p>--}}
                                        {{--<div class="cart-buttons">--}}
                                            {{--<a href="#"><i class="fa fa-shopping-cart"></i> View Cart</a>--}}
                                            {{--<a href="#"><i class="fa fa-sign-in"></i> Checkout</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--Logo Mainmenu Start-->
    <div class="header-logo-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo-menu-bg">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="logo">
                                    <a href="index.html"><img src="../img/yatri-logo/logoy.png" alt="ADVENTURES"></a>
                                </div>
                            </div>
                            <div class="col-md-8 hidden-sm hidden-xs">
                                <div class="mainmenu">
                                    <nav>
                                        <ul id="nav">
                                            <li><a href="{{ route('home') }}">HOME</a></li>
                                            <li><a href="{{ route('dest') }}">Destination</a>
                                                <div class="megamenu">
                                                    <div class="megamenu-list clearfix">
                                                                <span class="border-hover">
                                                                    <a href="#" class="mega-image">
                                                                        <img src="../img/mega-b-4.jpg" alt="">
                                                                    </a>
                                                                </span>
                                                        <span>
                                                                    <a href="#" class="mega-title">Edgeworks Climbing</a>
                                                                    <a href="#">Indoor climbing</a>
                                                                    <a href="#">Rock climbing</a>
                                                                    <a href="#">Climbing competition</a>
                                                                    <a href="#">Top rope climbing</a>
                                                                    <a href="#">Traditional climbing</a>
                                                                    <a href="#">Free solo climbing</a>
                                                                </span>
                                                        <span>
                                                                    <a href="#" class="mega-title">Academic Mountain</a>
                                                                    <a href="#">Fold and thrust belt</a>
                                                                    <a href="#">Fault-block mountain</a>
                                                                    <a href="#">Mountain ranges</a>
                                                                    <a href="#">Sedimentary</a>
                                                                    <a href="#">Subaqueous volcano</a>
                                                                    <a href="#">Complex volcano</a>
                                                                </span>
                                                        <span>
                                                                    <a href="#" class="mega-title">Adventure Camping</a>
                                                                    <a href="#">Bicycle Camping</a>
                                                                    <a href="#">Canoe Camping</a>
                                                                    <a href="#">Reenact camping</a>
                                                                    <a href="#">Winter camping</a>
                                                                    <a href="#">Dry camping</a>
                                                                    <a href="#">Backpacking</a>
                                                                </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="drop-down"><a href="{{ route('home') }}">Pages</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#" class="mega-title">Other Pages</a></li>
                                                    <li><a href="{{ route('contact') }}">About Us</a></li>
                                                    <li><a href="signin.html">Sign In</a></li>
                                                    <li><a href="404.html">404 Error</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('blog') }}">BLOG</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Logo Mainmenu-->
    <!-- Mobile Menu Area start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="index.html">HOME</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('contact') }}">ABOUT</a>
                                <li><a href="#">PAGES</a>
                                    <ul>
                                        <li><a href="signin.html">Sign in</a></li>
                                        <li><a href="404.html">404 error</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">CONTACT</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area end -->
</header>
<!--End of Header Area-->