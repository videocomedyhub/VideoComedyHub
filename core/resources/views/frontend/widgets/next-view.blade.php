<!-- next to view Widget -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="widgetTitle">
            <h5>Next to Watch</h5>
        </div>
        <div class="widgetContent">
            @foreach($nextVideos as $video)
            <div class="video-box thumb-border">
                <div class="video-img-thumb">
                    <img class="ld" src="{{asset('assets/images/preload.png')}}"  data-original="{{$video->thumbnail}}" alt="{{$video->seo_title}}">
                    <a title="{{$video->seo_title}}" href="{{route('videos.single',['slug' => $video->slug])}}" class="hover-posts">
                        <span><i class="fa fa-play"></i>Watch Video</span>
                    </a>
                </div>
                <div class="video-box-content">
                    <h6><a href="{{route('videos.single',['slug' => $video->slug])}}">{{$video->title}}</a></h6>
                    <p>
                        <span><i class="fa fa-user"></i><a title="{{$video->channel->title}}" href="{{route('channels.single',['slug' => $video->channel->slug])}}">{{$video->channel->title}}</a></span>
                        <span><i class="fa fa-clock-o"></i>{{$video->pretty_time}}</span>
                        <span><i class="fa fa-eye"></i>{{$video->count}}</span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end next to view Widget -->