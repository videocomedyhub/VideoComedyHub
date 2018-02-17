<div class="item large-4 medium-6 columns grid-medium">
    <div class="post thumb-border">
        <div class="post-thumb">
            <img src="{{$cat->image}}" alt="{{$cat->seo_title}}">
            <a title="{{$cat->title}}" href="{{route('categories.single', ['slug' => $cat->slug])}}" class="hover-posts">
                <span><i class="fa fa-search"></i>View Category</span>
            </a>
        </div>
        <div class="post-des">
            <h6><a title="{{$cat->title}}" href="{{route('categories.single', ['slug' => $cat->slug])}}">{{$cat->title}}</a></h6>
            <div class="post-stats clearfix">
                <p class="pull-left">
                    <i class="fa fa-clock-o"></i>
                    <span>{{$cat->pretty_time}}</span>
                </p>
                <p class="pull-left">
                    <i class="fa fa-eye"></i>
                    <span>{{$cat->videos()->count()}}</span>
                </p>
            </div>
            <div class="post-summary">
                <p>{{$cat->description}}</p>
            </div>
            <div class="post-button">
                <a title="{{$cat->title}}" href="{{route('categories.single', ['slug' => $cat->slug])}}" class="secondary-button"><i class="fa fa-search"></i>View videos in {{$cat->title}}</a>
            </div>
        </div>
    </div>
</div>