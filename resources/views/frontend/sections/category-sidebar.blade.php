<aside class="secBg sidebar">
    <div class="row">
        @include('frontend.widgets.search')

        @include('frontend.widgets.categories')
        
        @include('frontend.widgets.socialfan')
        
        @include('frontend.widgets.slide-video')

        @include('frontend.widgets.ads')
        
        @include('frontend.widgets.trending-videos')

        @if(isset($tags))
        @include('frontend.widgets.tags')
        @endif

        @include('frontend.widgets.news')

        @include('frontend.widgets.twitter')
        
    </div>
</aside>