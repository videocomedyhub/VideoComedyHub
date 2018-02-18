@extends('layouts.app')

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('assets/css/jquery.kyco.easyshare.css')}}">
@endsection

@section('content')
<!--breadcrumbs-->
@include('frontend.sections.breadcrumb', ['current' => 'Search results for ' . $query , 'items' => []])
<!--end breadcrumbs-->
<section class="category-content">
    <div class="row">
        <!-- left side content area -->
        <div class="large-8 columns">
            <section class="content content-with-sidebar">
                <!-- newest video -->
                <div class="main-heading removeMargin">
                    <div class="row secBg padding-14 removeBorderBottom">
                        <div class="medium-8 small-12 columns">
                            <div class="head-title">
                                <i class="fa fa-search"></i>
                                <h4>Search Results for “ {{$query}} ”</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="row column head-text clearfix">
                            <p class="pull-left">Search Results :<span>{{$count}} {{str_plural('comedy')}} matching {{$query}} found</span></p>
                            <div class="grid-system pull-right show-for-large">
                                <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                <a class="secondary-button current grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                            </div>
                        </div>
                        <div class="tabs-content" data-tabs-content="newVideos">
                            <div class="tabs-panel is-active" id="new-all">
                                <div class="row list-group">
                                    @foreach($videos as $vid)
                                        @include('frontend.lists.medium-content-video')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{ $videos->links('frontend.commons.pagination-default') }}
                    </div>
                </div>
            </section>
            
            @include('frontend.sections.adblock')
            
        </div><!-- end left side content area -->
         <!-- sidebar -->
        <div class="large-4 columns">
            @include('frontend.sections.category-sidebar')
        </div><!-- end sidebar -->
    </div>
</section><!-- End Category Content-->

@endsection