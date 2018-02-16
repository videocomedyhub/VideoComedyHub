@if(isset($tags))
<!-- tags -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="widgetTitle">
            <h5>Tags</h5>
        </div>
        <div class="tagcloud">
            @foreach($tags as $tag)
            <a title="{{$tag->name}}" href="{{route('tags.single', ['slug' => $tag->slug])}}">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</div>
<!-- End tags -->
@endif