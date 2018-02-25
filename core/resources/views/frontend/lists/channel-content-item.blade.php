<div class="item large-4 medium-6 columns grid-medium">
    <div class="post thumb-border">
        <div class="post-thumb">
            <img class="ld" src="{{asset('assets/images/preload.png')}}"  data-original="{{$ch->thumbnail}}" alt="{{$ch->seo_title}}">
            <a title="{{$ch->title}}" href="{{route('channels.single', ['slug' => $ch->slug])}}" class="hover-posts">
                <span><i class="fa fa-search"></i>View Channel</span>
            </a>
        </div>
        <div class="post-des">
            <h6><a title="{{$ch->title}}" href="{{route('channels.single', ['slug' => $ch->slug])}}">{{$ch->title}}</a></h6>
            <div class="post-stats clearfix">
                <p class="pull-left">
                    <i class="fa fa-clock-o"></i>
                    <span>{{$ch->pretty_time}}</span>
                </p>
            </div>
            <div class="post-summary">
                <p>{{$ch->description}}</p>
            </div>
            <div class="post-button">
                <a title="{{$ch->title}}" href="{{route('channels.single', ['slug' => $ch->slug])}}" class="secondary-button"><i class="fa fa-search"></i>Watch {{$ch->title}} Videos</a>
            </div>
        </div>
    </div>
</div>