<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">

    <!-- Google Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Fontawsome CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/jquery-ui.css">

    <!-- meanmenu CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">

    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/animate.css">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="../lib/nivo-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="../lib/nivo-slider/css/preview.css" type="text/css" media="screen" />

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">

    <link rel="stylesheet" href="../css/fdw-demo.css" type="text/css" />
    <link rel="stylesheet" href="../css/styles.css" type="text/css" />

    <!-- modernizr JS
    ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

@include('frontend.layouts.ProductDetails.header')


@yield('mainContent')

@yield('searchContent')


@include('frontend.layouts.Home.footer')

<!-- jquery
============================================ -->
<script src="../js/vendor/jquery-1.12.3.min.js"></script>

<!-- bootstrap JS
============================================ -->
<script src="../js/bootstrap.min.js"></script>

<!-- nivo slider js
============================================ -->
<script src="../lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="../lib/nivo-slider/home.js" type="text/javascript"></script>

<!-- wow JS
============================================ -->
<script src="../js/wow.min.js"></script>

<!-- meanmenu JS
============================================ -->
<script src="../js/jquery.meanmenu.js"></script>

<!-- owl.carousel JS
============================================ -->
<script src="../js/owl.carousel.min.js"></script>

<!-- price-slider JS
============================================ -->
<script src="../js/jquery-price-slider.js"></script>

<!-- scrollUp JS
============================================ -->
<script src="../js/jquery.scrollUp.min.js"></script>

<!-- Waypoints JS
============================================ -->
<script src="../js/waypoints.min.js"></script>

<!-- Counter Up JS
============================================ -->
<script src="../js/jquery.counterup.min.js"></script>

<!-- plugins JS
============================================ -->
<script src="../js/plugins.js"></script>

<!-- main JS
============================================ -->
<script src="../js/main.js"></script>
</body>
</html>
