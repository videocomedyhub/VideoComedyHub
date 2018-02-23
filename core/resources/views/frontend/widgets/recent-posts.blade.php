<!-- Recent post videos -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="widgetTitle">
            <h5>Recent Posts</h5>
        </div>
        <div class="widgetContent">
            @foreach($posts as $post)
            <div class="media-object stack-for-small">
                <div class="media-object-section">
                    <div class="recent-img">
                        <img src="{{asset('assets/images/preload.png')}}"  data-original="{{$post->image}}" alt="{{$post->seo_title}}">
                        <a href="{{route('posts.single', ['slug' => $post->slug])}}" class="hover-posts">
                            <span><i class="fa fa-play"></i></span>
                        </a>
                    </div>
                </div>
                <div class="media-object-section">
                    <div class="media-content">
                        <h6><a href="{{route('posts.single', ['slug' => $post->slug])}}">{{$post->title}}</a></h6>
                        <p><i class="fa fa-user"></i><span>{{$post->user->username}}</span><i class="fa fa-clock-o"></i><span>{{$post->created_at}}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Recent post videos -->