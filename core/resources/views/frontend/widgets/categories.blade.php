<!-- categories -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="widgetTitle">
            <h5>Categories</h5>
        </div>
        <div class="widgetContent">
            <ul class="accordion" data-accordion>
                @foreach($cats as $cat)
                <li class="accordion-item" data-accordion-item>
                    <a title="{{$cat->title}}" href="{{route('categories.single', ['slug' => $cat->slug])}}" class="accordion-title">{{$cat->title}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
