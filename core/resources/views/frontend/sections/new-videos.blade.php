<section class="content">
    <div class="main-heading">
        <div class="row secBg padding-14">
            <div class="medium-8 small-8 columns">
                <div class="head-title">
                    <i class="fa fa-film"></i>
                    <h4>Newest Videos</h4>
                </div>
            </div>
            <div class="medium-4 small-4 columns">
                <ul class="tabs text-right pull-right" data-tabs id="newVideos">
                    <li class="tabs-title is-active"><a href="#new-all">all</a></li>
                    <li class="tabs-title"><a href="#new-hd">HD</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row secBg">
        <div class="large-12 columns">
            <div class="row column head-text clearfix">
                <p class="pull-left">All Videos : <span>{{ \App\Entities\Video::count()}} Videos posted</span></p>
                <div class="grid-system pull-right show-for-large">
                    <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                    <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                    <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                </div>
            </div>
            <div class="tabs-content" data-tabs-content="newVideos">
                <div class="tabs-panel is-active" id="new-all">
                    <div class="row list-group">
                        @foreach($newVideos as $vid)
                        @include('frontend.lists.large-content-video')
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center row-btn">
                <a class="button radius" href="{{route('videos.new')}}">View All Video</a>
            </div>
        </div>
    </div>
</section>