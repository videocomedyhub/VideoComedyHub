<section id="top" class="topBar show-for-large">
    <div class="row">
        <div class="medium-6 columns">
            <div class="socialLinks">
                <a href="{{$socials['facebook']}}"><i class="fa fa-facebook-f"></i></a>
                <a href="{{$socials['twitter']}}"><i class="fa fa-twitter"></i></a>
                <a href="{{$socials['facebook']}}"><i class="fa fa-google-plus"></i></a>
                <a href="{{$socials['instagram']}}"><i class="fa fa-instagram"></i></a>
                <a href="{{$socials['youtube']}}"><i class="fa fa-vimeo"></i></a>
                <a href="{{$socials['youtube']}}"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
        <div class="medium-6 columns">
            <div class="top-button">
                <ul class="menu float-right">
                    <li>
                        <a href="#">upload Video</a>
                    </li>

                    @guest
                    <li class="dropdown-login">
                        <a class="loginReg" data-toggle="example-dropdown" href="#">login/Register</a>
                        <div class="login-form">
                            <h6 class="text-center">Great to have you back!</h6>
                            <form  method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-user"></i></span>
                                    <input name="username" class="input-group-field" type="text" placeholder="Enter username">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input name="password" class="input-group-field" type="text" placeholder="Enter password">
                                </div>
                                <div class="checkbox">
                                    <input id="check1" type="checkbox" name="remember" value="check">
                                    <label class="customLabel" for="check1">Remember me</label>
                                </div>
                                <input type="submit" name="submit" value="Login Now">
                            </form>
                            <p class="text-center">New here? <a class="newaccount" href="{{route('register')}}">Create a new Account</a></p>
                        </div>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> Logout <span class="caret"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest

                </ul>
            </div>
        </div>
    </div>
</section>