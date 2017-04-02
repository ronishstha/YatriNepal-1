@extends('frontend.layouts.ProductDetails.masterProduct')
@section('mainContent')
    @include('frontend.layouts.ProductDetails.TripInformation')
    @include('frontend.layouts.ProductDetails.TripInclution')
    {{--@include('frontend.layouts.ProductDetails.PricingArea')--}}
    @include('frontend.layouts.ProductDetails.TripGallery')
    @include('frontend.layouts.ProductDetails.SimilarArea')
{{--    @include('frontend.layouts.ProductDetails.PartnerArea')--}}
    @include('frontend.layouts.Home.PartnerArea')
@endsection


