@extends('layouts.app')

@section('content')

<!--breadcrumbs-->
@include('frontend.sections.breadcrumb', ['current' => 'about me', 'items' => ['users' => '#']])
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
                    <img src="{{$user->avatar}}" alt="{{$user->name}} profile picture">
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
        <section class="singlePostDescription">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="heading">
                        <i class="fa fa-user"></i>
                        <h4>Bio</h4>
                    </div>
                    <div class="description">
                        <p>{{isset($user->tagline)?$user->tagline:"No tagline"}}</p>
                        <p>{{isset($user->bio)?$user->bio:"No bio"}}</p>
                        <div class="site profile-margin">
                            <button><i class="fa fa-globe"></i>Site</button>
                            <a href="{{$user->web}}" class="inner-btn">{{$user->web}}</a>
                        </div>
                        <div class="email profile-margin">
                            <button><i class="fa fa-envelope"></i>Email</button>
                            <span class="inner-btn">{{$user->email}}</span>
                        </div>
                        <div class="phone profile-margin">
                            <button><i class="fa fa-phone"></i>Phone</button>
                            <span class="inner-btn">92-568-748</span>
                        </div>
                        <div class="socialLinks profile-margin">
                            <button><i class="fa fa-share-alt"></i>get socialize</button>
                            <a href="#" class="inner-btn"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="inner-btn"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="inner-btn"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="inner-btn"><i class="fa fa-flickr"></i></a>
                        </div>


                    </div>
                </div>
            </div>
        </section><!-- End single post description -->
    </div><!-- end left side content area -->
</div>
@endsection