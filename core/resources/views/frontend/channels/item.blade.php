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
                                    <div class="item large-4 medium-6 columns grid-medium{{$loop->last? ' end': ''}}">
                                        <div class="post thumb-border">
                                            <div class="post-thumb">
                                                <img class="ld" src="{{asset('assets/images/preload.png')}}"  data-original="{{$vid->thumbnail}}" alt="{{$vid->seo_title}}">
                                                <a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}" class="hover-posts" title="{{$vid->seo_title}}">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                                <div class="video-stats clearfix">
                                                    <div class="thumb-stats pull-left">
                                                        <i class="fa fa-heart"></i>
                                                        <span>{{$vid->count}}</span>
                                                    </div>
                                                    <div class="thumb-stats pull-right">
                                                        <span>{{$vid->duration}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-des">
                                                <h6><a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}" title="{{$vid->title}}">{{$vid->title}}</a></h6>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-user"></i>
                                                        <span><a href="{{route('channels.single',['slug' => $channel->slug])}}" title="{{$channel->title}}">{{str_limit($channel->title,35)}}</a></span>
                                                    </p>
                                                </div>
                                                <div class="post-stats clearfix">
                                                    <p class="pull-left">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>{{$vid->pretty_time}}</span>
                                                    </p>
                                                    <p class="pull-left">
                                                        <i class="fa fa-eye"></i>
                                                        <span>{{$vid->count}}</span>
                                                    </p>
                                                </div>
                                                <div class="post-summary">
                                                    <p>{{$vid->description}}</p>
                                                </div>
                                                <div class="post-button">
                                                    <a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}" class="secondary-button"><i class="fa fa-play-circle"></i>Watch {{$vid->title}} Video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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