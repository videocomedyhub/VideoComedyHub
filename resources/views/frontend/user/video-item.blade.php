<div class="profile-video">
    <div class="media-object stack-for-small">
        <div class="media-object-section media-img-content">
            <div class="video-img">
                <img src="{{$vid->thumbnail}}" alt="{{$vid->seo_title}}">
            </div>
        </div>
        <div class="media-object-section media-video-content">
            <div class="video-content">
                <h5><a title="{{$vid->title}}" href="{{route('videos.single',['slug' => $vid->slug])}}">{{$vid->title}}</a></h5>
                <p>{{$vid->description}}</p>
            </div>
            <div class="video-detail clearfix">
                <div class="video-stats">
                    <span><i class="fa fa-clock-o"></i>{{$vid->pretty_time}}</span>
                    <span><i class="fa fa-eye"></i>1,862K</span>
                </div>
                <div class="video-btns">
                    <form method="post" action="{{route('favourite')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="video_id" value="{{$vid->id}}" />
                        <button type="submit" name="unfav"><i class="fa fa-heart-o"></i>Unfavorite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>