@extends('layouts.app')

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('assets/css/jquery.kyco.easyshare.css')}}">
@endsection

@section('content')
<div id="video_title">
    <div class="container">
        <span class="label">You're watching:</span> <h1>{{title_case($video->title)}}</h1>
    </div>
</div>
<!--breadcrumbs-->
@include('frontend.sections.breadcrumb-video', ['current' => $video->title, 'items' => ['channel' => route('channels'), $video->channel->title => route('channels.single', ['slug' => $video->channel->slug])]])
<!--end breadcrumbs-->

<div class="row">
    <!-- left side content area -->
    <div class="large-8 columns">
        <!--single inner video-->
        <section class="inner-video">
            <div class="row secBg">
                <div class="large-12 columns inner-flex-video">
                    <div class="flex-video widescreen">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video->video_id}}?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- single post stats -->
        <section class="SinglePostStats">
            <!-- newest video -->
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section">
                            <div class="author-img-sec">
                                <div class="thumbnail author-single-post">
                                    <a href="{{route('channels.single', ['slug' => $video->channel->slug])}}"><img src= "{{$video->channel->thumbnail}}" alt="{{$video->channel->seo_title}}"></a>
                                </div>
                                <p class="text-center"><a href="{{route('channels.single', ['slug' => $video->channel->slug])}}">{{$video->channel->title}}</a></p>
                            </div>
                        </div>
                        <div class="media-object-section object-second">
                            <div class="author-des clearfix">
                                <div class="post-title">
                                    <h4>{{$video->title}}</h4>
                                    <p>
                                        <span><i class="fa fa-clock-o"></i>{{$video->published_at}}</span>
                                        <span><i class="fa fa-eye"></i>{{$video->count}}</span>
                                        <span><i class="fa fa-thumbs-o-up"></i>1,862</span>
                                        <span><i class="fa fa-thumbs-o-down"></i>180</span>
                                        <span><i class="fa fa-commenting"></i>8</span>
                                    </p>
                                </div>
                                <div class="subscribe">
                                    <form method="post">
                                        <button type="submit" name="subscribe">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <div class="social-share">
                                <div class="post-like-btn clearfix">
                                    <form method="post">
                                        <button type="submit" name="fav"><i class="fa fa-heart"></i>Add to</button>
                                    </form>
                                    <a href="#" class="secondary-button"><i class="fa fa-thumbs-o-up"></i></a>
                                    <a href="#" class="secondary-button"><i class="fa fa-thumbs-o-down"></i></a>

                                    <div class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="{{route('videos.single',['slug' => $video->slug])}}">
                                        <!-- Total -->
                                        <button data-easyshare-button="total">
                                            <span>Total</span>
                                        </button>
                                        <span data-easyshare-total-count>0</span>

                                        <!-- Facebook -->
                                        <button data-easyshare-button="facebook">
                                            <span class="fa fa-facebook"></span>
                                            <span>Share</span>
                                        </button>
                                        <span data-easyshare-button-count="facebook">0</span>

                                        <!-- Twitter -->
                                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                            <span class="fa fa-twitter"></span>
                                            <span>Tweet</span>
                                        </button>
                                        <span data-easyshare-button-count="twitter">0</span>

                                        <!-- Google+ -->
                                        <button data-easyshare-button="google">
                                            <span class="fa fa-google-plus"></span>
                                            <span>+1</span>
                                        </button>
                                        <span data-easyshare-button-count="google">0</span>

                                        <div data-easyshare-loader>Loading...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End single post stats -->

        <!-- single post description -->
        <section class="singlePostDescription">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="heading">
                        <h5>Description</h5>
                    </div>
                    <div class="description showmore_one">
                        <p>{{$video->description}}</p>

                        <div class="categories">
                            <button><i class="fa fa-folder"></i>Categories</button>
                            @foreach($video->categories as $cat)
                            <a href="{{route('categories.single', ['slug' => $cat->slug])}}" class="inner-btn">{{$cat->title}}</a>
                            @endforeach
                        </div>
                        <div class="tags">
                            <button><i class="fa fa-tags"></i>Tags</button>
                            @foreach($video->tags as $tag)
                            <a href="{{route('tags.single', ['slug' => $tag->slug])}}" class="inner-btn">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End single post description -->
        @include('frontend.sections.adblock')
        <!-- related Posts -->
        <section class="content content-with-sidebar related">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="main-heading borderBottom">
                        <div class="row padding-14">
                            <div class="medium-12 small-12 columns">
                                <div class="head-title">
                                    <i class="fa fa-film"></i>
                                    <h4>More Videos from {{$video->channel->title}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row list-group">
                        @foreach($relatedVideos as $vid)
                        @include('frontend.lists.medium-b-content-video')
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!--end related posts-->
        @include('frontend.sections.comments')
    </div><!-- end left side content area -->
    <!-- sidebar -->
    <div class="large-4 columns">
        @include('frontend.sections.video-sidebar')
    </div><!-- end sidebar -->
</div>

@endsection