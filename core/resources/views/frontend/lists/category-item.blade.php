<div class="item-cat item thumb-border">
    <figure class="premium-img">
        <img src="{{asset('uploads/categories/' . $category->image)}}" alt="{{$category->seo_title}}">
        <a href="{{route('categories.single', ['slug' => $category->slug])}}" class="hover-posts">
            <span><i class="fa fa-search"></i></span>
        </a>
    </figure>
    <h6><a title="{{$category->title}}" href="{{route('categories.single', ['slug' => $category->slug])}}">{{$category->title}}</a></h6>
</div>