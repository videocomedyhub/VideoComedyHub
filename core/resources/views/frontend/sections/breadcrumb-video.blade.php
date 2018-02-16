<section id="breadcrumb" class="breadcrumb-video-2">
    <div class="row">
        <div class="large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home"></i><a href="{{route('index')}}">Home</a></li>
                    @foreach($items as $k => $v)
                    <li><a title="{{$k}}" href="{{$v}}">{{$k}}</a></li>
                    @endforeach
                    <li>
                        <span class="show-for-sr">Current: </span> {{$current}}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>