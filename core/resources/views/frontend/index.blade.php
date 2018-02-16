@extends('layouts.app')

@section('content')

<!-- layerslider -->
@include('frontend.sections.layerslider')
<!--end slider-->

<!-- Premium Videos -->
@include('frontend.sections.premiumvideo')
<!-- End Premium Videos -->

<!-- Category -->
@include('frontend.sections.browse-category')
<!-- End Category -->

<!-- main content -->
<!-- newest video -->
@include('frontend.sections.new-videos')
<!-- End newest video -->

@include('frontend.sections.adblock')

@include('frontend.sections.popular-videos')

@include('frontend.sections.adblock')
<!-- End main content -->

<!-- movies -->
@include('frontend.sections.watch-list')
<!-- End movie -->

@include('frontend.sections.adblock')

@endsection