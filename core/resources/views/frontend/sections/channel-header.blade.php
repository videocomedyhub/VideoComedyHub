<!-- profile top section -->
<section class="topProfile">
    <div class="main-text text-center">
        <div class="row">
            <div class="large-12 columns">
                <h3>Channel</h3>
                <h1>{{$channel->title}}</h1>
            </div>
        </div>
    </div>
    <div class="profile-stats">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="profile-author-img">
                    <img src="{{$channel->thumbnail}}" alt="{{$channel->title}}">
                </div>
                <div class="profile-subscribe">
                    <span><i class="fa fa-users"></i>6</span>
                    <button type="submit" name="subscribe">subscribe</button>
                </div>
                <div class="profile-share">
                    <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="{{route('channels.single', ['slug' => $channel->slug])}}">
                        <!-- Facebook -->
                        <button data-easyshare-button="facebook">
                            <span class="fa fa-facebook"></span>
                            <span>Share</span>
                        </button>
                        <span data-easyshare-button-count="facebook">0</span>

                        <!-- Twitter -->
                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                            <span class="fa fa-twitter"></span>
                            <span>Tweet</span>
                        </button>
                        <span data-easyshare-button-count="twitter">0</span>

                        <!-- Google+ -->
                        <button data-easyshare-button="google">
                            <span class="fa fa-google-plus"></span>
                            <span>+1</span>
                        </button>
                        <span data-easyshare-button-count="google">0</span>

                        <div data-easyshare-loader>Loading...</div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="profile-author-name float-left">
                        <h4>{{$channel->title}}</h4>
                        <p>Published Date : <span>{{$channel->pretty_time}}</span></p>
                    </div>
                    <div class="profile-author-stats float-right">
                        <ul class="menu">
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-video-camera"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">{{$channel->videos()->count()}}</p>
                                    <span>Videos</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">50</p>
                                    <span>favorites</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">6</p>
                                    <span>followers</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">26</p>
                                    <span>comments</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End profile top section -->