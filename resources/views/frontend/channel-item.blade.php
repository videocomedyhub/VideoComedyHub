@extends('layouts.app')

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('assets/css/jquery.kyco.easyshare.css')}}">
@endsection

@section('content')

<!--breadcrumbs-->
@include('frontend.sections.breadcrumb', ['current' => $channel->title, 'items' => ['channels' => route('channels')]])
<!--end breadcrumbs-->

@include('frontend.sections.channel-header')

<section class="category-content">
    <div class="row">
        <!-- left side content area -->
        <div class="large-8 columns">
                                <!-- single post description -->
                    <section class="singlePostDescription">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <i class="fa fa-user"></i>
                                    <h4>Description</h4>
                                </div>
                                <div class="description">
                                    <p>{{$channel->description}}</p>

                                    <div class="site profile-margin">
                                        <button><i class="fa fa-globe"></i>Youtube Page</button>
                                        <a href="https://youtube.com/channel/{{$channel->channel_id}}" class="inner-btn">https://youtube.com/channel/{{$channel->channel_id}}</a>
                                    </div>
                                    <div class="email profile-margin">
                                        <button><i class="fa fa-envelope"></i>Email</button>
                                        <span class="inner-btn">support@betube.com</span>
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
            
            <section class="content content-with-sidebar">
                <!-- newest video -->
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="row column head-text clearfix">
                            <p class="pull-left">All Videos : <span>{{$channel->videos()->count()}} Videos in {{$channel->title}}</span></p>
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