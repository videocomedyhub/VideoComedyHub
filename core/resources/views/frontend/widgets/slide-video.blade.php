<!-- slide video -->
<div class="large-12 medium-7 medium-centered columns">
    <section class="widgetBox">
        <div class="row">
            <div class="large-12 columns">
                <div class="column row">
                    <div class="heading category-heading clearfix">
                        <div class="cat-head pull-left">
                            <h4>Trending Comedy</h4>
                        </div>
                        <div class="sidebar-video-nav">
                            <div class="navText pull-right">
                                <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                                <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slide Videos-->
                <div id="owl-demo-video" class="owl-carousel carousel" data-car-length="1" data-items="1" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false">
                    @foreach($trendingVideos as $video)
                    <div class="item item-video thumb-border">
                        <figure class="premium-img">
                            <img class="ld" src="{{asset('assets/images/preload.png')}}"  data-original="{{$video->thumbnail}}"  alt="{{$video->seo_title}}">
                            <a title="{{$video->title}}" href="{{route('videos.single',['slug' => $video->slug])}}" class="hover-posts">
                                <span><i class="fa fa-play"></i></span>
                            </a>
                        </figure>
                        <div class="video-des">
                            <h6><a title="{{$video->title}}" href="{{route('videos.single',['slug' => $video->slug])}}">{{$video->title}}</a></h6>
                            <div class="post-stats clearfix">
                                <p class="pull-left">
                                    <i class="fa fa-user"></i>
                                    <span><a title="{{$video->channel->title}}" href="{{route('channels.single',['slug' => $video->channel->slug])}}">{{$video->channel->title}}</a></span>
                                </p>
                                <p class="pull-left">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{$video->pretty_time}}</span>
                                </p>
                                <p class="pull-left">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{$video->duration}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- end carousel -->
            </div>
        </div>
    </section><!-- End Category -->
</div>
<!-- End slide video -->