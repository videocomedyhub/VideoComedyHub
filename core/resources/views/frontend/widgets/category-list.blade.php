<!-- categories -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox clearfix">
        <div class="widgetTitle">
            <h5>Categories</h5>
        </div>
        <div class="widgetContent clearfix">
            <ul>
                @foreach($cats as $category)
                <li class="cat-item"><a title="{{$category->title}}" href="{{route('categories.single', ['slug' => $category->slug])}}">{{$category->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>