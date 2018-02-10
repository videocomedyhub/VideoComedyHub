<div class="item large-3 medium-6 columns group-item-grid-default{{$loop->last? ' end': ''}}">
    <div class="post thumb-border">
        <div class="post-thumb">
            <img src="{{$vid->thumbnail}}" alt="{{$vid->seo_title}}">
            <a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}" class="hover-posts">
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
            <h6><a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}">{{$vid->title}}</a></h6>
            <div class="post-stats clearfix">
                <p class="pull-left">
                    <i class="fa fa-user"></i>
                    <span><a title="{{$vid->channel->title}}" href="{{route('channels.single',['slug' => $vid->channel->slug])}}">{{$vid->channel->title}}</a></span>
                </p>
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