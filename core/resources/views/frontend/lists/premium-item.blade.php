<div class="item">
    <figure class="premium-img">
        <img src="{{$vid->thumbnail}}" alt="{{$vid->seo_title}}">
        <figcaption>
            <h5>{{str_limit($vid->title, 30)}}</h5>
            <p>{{$vid->channel->title}}</p>
        </figcaption>
    </figure>
    <a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}" class="hover-posts">
        <span><i class="fa fa-play"></i>Watch {{$vid->title}} Video</span>
    </a>
</div>