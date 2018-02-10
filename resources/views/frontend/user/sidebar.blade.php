<div class="large-4 columns">
    <aside class="secBg sidebar">
        <div class="row">
            <!-- profile overview -->
            <div class="large-12 columns">
                <div class="widgetBox">
                    <div class="widgetTitle">
                        <h5>Profile Overview</h5>
                    </div>
                    <div class="widgetContent">
                        <ul class="profile-overview">
                            <li class="clearfix"><a class="active" href="{{route('user.about', ['username' => $user->username])}}"><i class="fa fa-user"></i>about me</a></li>
                            <li class="clearfix"><a href="{{route('user.saved', ['username' => $user->username])}}"><i class="fa fa-video-camera"></i>Saved Videos <span class="float-right">36</span></a></li>
                            <li class="clearfix"><a href="{{route('user.favourite', ['username' => $user->username])}}"><i class="fa fa-heart"></i>Favorite Videos<span class="float-right">50</span></a></li>
                            <li class="clearfix"><a href="{{route('user.watched', ['username' => $user->username])}}"><i class="fa fa-users"></i>Watched<span class="float-right">6</span></a></li>
                            <li class="clearfix"><a href="{{route('home')}}"><i class="fa fa-comments-o"></i>comments<span class="float-right">26</span></a></li>
                            <li class="clearfix"><a href="{{route('home')}}"><i class="fa fa-gears"></i>Profile Settings</a></li>
                            <li class="clearfix"><a href="{{route('logout')}}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                        <a href="submit-post.html" class="button"><i class="fa fa-plus-circle"></i>Submit Video</a>
                    </div>
                </div>
            </div><!-- End profile overview -->
        </div>
    </aside>
</div>