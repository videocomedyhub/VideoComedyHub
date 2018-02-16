<section id="category">
    <div class="row secBg">
        <div class="large-12 columns">
            <div class="column row">
                <div class="heading category-heading clearfix">
                    <div class="cat-head pull-left">
                        <i class="fa fa-folder-open"></i>
                        <h4>Browse Comedies By Category</h4>
                    </div>
                    <div>
                        <div class="navText pull-right show-for-large">
                            <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                            <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- category carousel -->
            <div id="owl-demo-cat" class="owl-carousel carousel" data-car-length="6" data-items="6" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="4000" data-auto-width="true" data-margin="10" data-dots="false">
                @each('frontend.lists.category-item', $featuredCategories, 'category')
            </div><!-- end carousel -->
            <div class="row collapse">
                <div class="large-12 columns text-center row-btn">
                    <a href="{{route('categories')}}" class="button radius">View All Categories</a>
                </div>
            </div>
        </div>
    </div>
</section>