<footer>
    <div class="row">
        <div class="large-3 medium-6 columns">
            <div class="widgetBox">
                <div class="widgetTitle">
                    <h5>About {{config('app.name')}}</h5>
                </div>
                <div class="textwidget">
                    Betube video wordpress theme lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s book.
                </div>
            </div>
        </div>
        <div class="large-3 medium-6 columns">
            <div class="widgetBox">
                <div class="widgetTitle">
                    <h5>Recent Videos</h5>
                </div>
                <div class="widgetContent">
                    <div class="media-object">
                        <div class="media-object-section">
                            <div class="recent-img">
                                <img src= "http://placehold.it/80x80" alt="recent">
                                <a href="#" class="hover-posts">
                                    <span><i class="fa fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="media-object-section">
                            <div class="media-content">
                                <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="media-object">
                        <div class="media-object-section">
                            <div class="recent-img">
                                <img src= "http://placehold.it/80x80" alt="recent">
                                <a href="#" class="hover-posts">
                                    <span><i class="fa fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="media-object-section">
                            <div class="media-content">
                                <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="media-object">
                        <div class="media-object-section">
                            <div class="recent-img">
                                <img src= "http://placehold.it/80x80" alt="recent">
                                <a href="#" class="hover-posts">
                                    <span><i class="fa fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="media-object-section">
                            <div class="media-content">
                                <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="large-3 medium-6 columns">
            <div class="widgetBox">
                <div class="widgetTitle">
                    <h5>Tags</h5>
                </div>
                <div class="tagcloud">
                    <a href="#">3D Videos</a>
                    <a href="#">Videos</a>
                    <a href="#">HD</a>
                    <a href="#">Movies</a>
                    <a href="#">Sports</a>
                    <a href="#">3D</a>
                    <a href="#">Movies</a>
                    <a href="#">Animation</a>
                    <a href="#">HD</a>
                    <a href="#">Music</a>
                    <a href="#">Recreation</a>
                </div>
            </div>
        </div>
        <div class="large-3 medium-6 columns">
            <div class="widgetBox">
                <div class="widgetTitle">
                    <h5>Subscribe Now</h5>
                </div>
                <div class="widgetContent">
                    <form data-abide novalidate method="post">
                        <p>Subscribe to get exclusive videos</p>
                        <div class="input">
                            <input type="text" placeholder="Enter your full Name" required>
                            <span class="form-error">
                                Yo, you had better fill this out, it's required.
                            </span>
                        </div>
                        <div class="input">
                            <input type="email" id="email" placeholder="Enter your email addres" required>
                            <span class="form-error">
                                I'm required!
                            </span>
                        </div>
                        <button class="button" type="submit" value="Submit">Sign up Now</button>
                    </form>
                    <div class="social-links">
                        <h5>We’re a Social Bunch</h5>
                        <a class="secondary-button" href="{{$socials['facebook']}}"><i class="fa fa-facebook"></i></a>
                        <a class="secondary-button" href="{{$socials['twitter']}}"><i class="fa fa-twitter"></i></a>
                        <a class="secondary-button" href="{{$socials['google']}}"><i class="fa fa-google-plus"></i></a>
                        <a class="secondary-button" href="{{$socials['instagram']}}"><i class="fa fa-instagram"></i></a>
                        <a class="secondary-button" href="{{$socials['vimeo']}}"><i class="fa fa-vimeo"></i></a>
                        <a class="secondary-button" href="{{$socials['youtube']}}"><i class="fa fa-youtube"></i></a>
                        <a class="secondary-button" href="{{$socials['youtube']}}"><i class="fa fa-flickr"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-double-up"></i></a>
</footer>
<div id="footer-bottom">
    <div class="logo text-center">
        <img src="{{asset('assets/images/footerlogo.png')}}" alt="footer logo">
    </div>
    <div class="btm-footer-text text-center">
        <p>{{date('Y')}} &copy; {{config('app.name')}}</p>
    </div>
</div>