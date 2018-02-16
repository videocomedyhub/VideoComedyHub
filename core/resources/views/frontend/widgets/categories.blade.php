<!-- categories -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="widgetTitle">
            <h5>Categories</h5>
        </div>
        <div class="widgetContent">
            <ul class="accordion" data-accordion>
                @foreach($categories as $category)
                <li class="accordion-item" data-accordion-item>
                    <a title="{{$category->title}}" href="{{route('categories.single', ['slug' => $category->slug])}}" class="accordion-title">{{$category->title}}</a>
                    <div class="accordion-content" data-tab-content>
                        <ul>
                            @foreach($category->channels as $channel)
                            <li @if($loop->first)class="clearfix" @endif>
                                <i class="fa fa-play-circle-o"></i>
                                <a title="{{$channel->title}}" href="{{route('channels.single',['slug' => $channel->slug])}}">{{$channel->title}} <span>{{$channel->videos()->count()}}</span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
