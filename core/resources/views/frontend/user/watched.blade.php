@extends('layouts.app')

@section('content')

<!--breadcrumbs-->
@include('frontend.sections.breadcrumb', ['current' => 'favourite comedies', 'items' => ['users' => '#']])
<!--end breadcrumbs-->

<!-- profile top section -->
<section class="topProfile">
    <div class="main-text text-center">
        <div class="row">
            <div class="large-12 columns">
                <h3>Welcome Back</h3>
                <h1>{{$user->name}}</h1>
            </div>
        </div>
    </div>
    <div class="profile-stats">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="profile-author-img">
                    <img src="{{$user->avater}}" alt="{{$user->name}} profile picture">
                </div>
                <div class="clearfix">
                    <div class="profile-author-name float-left">
                        <h4>{{$user->name}}</h4>
                        <p>Join Date : <span>{{$user->pretty_time}}</span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!-- End profile top section -->
<div class="row">
    <!-- left sidebar -->
    @include('frontend.user.sidebar')
    <!-- end sidebar -->
    <!-- right side content area -->
    <div class="large-8 columns profile-inner">
        <!-- single post description -->
        <section class="profile-videos">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="heading">
                        <i class="fa fa-briefcase"></i>
                        <h4>History</h4>
                        @foreach($videos as $vid)
                        @include('frontend.user.video-list')
                        @endforeach
                    </div>
                    <div class="show-more-inner text-center">
                        <a href="#" class="show-more-btn">show more</a>
                    </div>
                </div>
            </div>
        </section><!-- End single post description -->
    </div><!-- end left side content area -->
</div>
@endsection