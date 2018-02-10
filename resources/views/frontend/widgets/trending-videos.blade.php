<!-- Trending videos -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="widgetTitle">
            <h5>Recent Videos</h5>
        </div>
        <div class="widgetContent">
            @foreach($trendingVideos as $video)
            <div class="media-object stack-for-small">
                <div class="media-object-section">
                    <div class="recent-img">
                        <img src= "{{$video->thumbnail}}" alt="{{$video->seo_title}}">
                        <a title="{{$video->title}}" href="{{route('videos.single',['slug' => $video->slug])}}" class="hover-posts">
                            <span><i class="fa fa-play"></i></span>
                        </a>
                    </div>
                </div>
                <div class="media-object-section">
                    <div class="media-content">
                        <h6><a title="{{$video->title}}" href="{{route('videos.single',['slug' => $video->slug])}}">{{$video->title}}</a></h6>
                        <p><i class="fa fa-user"></i><span><a title="{{$video->channel->title}}" href="{{route('channels.single',['slug' => $video->channel->slug])}}">{{$video->channel->title}}</a></span><i class="fa fa-clock-o"></i><span>{{$video->pretty_time}}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Trending videos -->