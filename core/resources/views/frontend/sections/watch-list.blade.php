<section id="movies">
    <div class="row secBg">
        <div class="large-12 columns">
            <div class="column row">
                <div class="heading category-heading clearfix">
                    <div class="cat-head pull-left">
                        <i class="fa fa-video-camera"></i>
                        <h4>Watch Comedies</h4>
                    </div>
                    <div>
                        <div class="navText pull-right show-for-large">
                            <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                            <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- movie carousel -->
            <div id="owl-demo-movie" class="owl-carousel carousel" data-autoplay="true" data-autoplay-timeout="3000" data-autoplay-hover="true" data-car-length="5" data-items="6" data-dots="false" data-loop="true" data-auto-width="true" data-margin="10">
                @each('frontend.lists.watch-item',$watchedVideos, 'vid')
            </div><!-- end carousel -->
        </div>
    </div>
</section>