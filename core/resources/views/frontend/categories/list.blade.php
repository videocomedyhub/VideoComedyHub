@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{asset('assets/css/jquery.kyco.easyshare.css')}}">
@endsection

@section('content')
<!--breadcrumbs-->
@include('frontend.sections.breadcrumb', ['current' => 'categories', 'items' => []])
<!--end breadcrumbs-->

<section class="category-content">
    <div class="row">
        <!-- left side content area -->
        <div class="large-8 columns">
            <section class="content content-with-sidebar">
                <!-- newest video -->
                <div class="main-heading removeMargin">
                    <div class="row secBg padding-14 removeBorderBottom">
                        <div class="medium-8 small-8 columns">
                            <div class="head-title">
                                <i class="fa fa-film"></i>
                                <h4>Categories</h4>
                            </div>
                        </div>
                        <div class="medium-4 small-4 columns">
                            <ul class="tabs text-right pull-right" data-tabs id="newVideos">
                                <li class="tabs-title is-active"><a href="#new-all">all</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="row column head-text clearfix">
                            <div class="grid-system pull-right show-for-large">
                                <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                <a class="secondary-button current grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                            </div>
                        </div>
                        <div class="tabs-content" data-tabs-content="newVideos">
                            <div class="tabs-panel is-active" id="new-all">
                                <div class="row list-group">
                                    @foreach($categories as $cat)
                                    <div class="item large-4 medium-6 columns grid-medium">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img class="ld" src="{{asset('assets/images/preload.png')}}"  data-original="{{asset('uploads/categories/' . $cat->image)}}" alt="{{$cat->seo_title}}">
                                                <a title="{{$cat->title}}" href="{{route('categories.single', ['slug' => $cat->slug])}}" class="hover-posts">
                                                    <span><i class="fa fa-search"></i>View Category</span>
                                                </a>
                                            </div>
                                            <div class="post-des">
                                                <h6><a title="{{$cat->title}}" href="{{route('categories.single', ['slug' => $cat->slug])}}">{{$cat->title}}</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>{{$cat->pretty_time}}</span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>{{$cat->description}}</p>
                                                </div>
                                                <div class="post-button">
                                                    <a title="{{$cat->title}}" href="{{route('categories.single', ['slug' => $cat->slug])}}" class="secondary-button"><i class="fa fa-search"></i>View videos in {{$cat->title}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{ $categories->links('frontend.commons.pagination-default') }}
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