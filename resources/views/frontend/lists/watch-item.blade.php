<div class="item-movie item thumb-border">
    <figure class="premium-img">
        <img src="{{$vid->thumbnail}}" alt="{{$vid->seo_title}}">
        <a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}" class="hover-posts">
            <span>{{$vid->seo_title}}<i class="fa fa-search"></i></span>
        </a>
    </figure>
</div>