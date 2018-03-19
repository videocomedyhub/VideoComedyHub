<div class="off-canvas position-left light-off-menu" id="offCanvas-responsive" data-off-canvas>
    <div class="off-menu-close">
        <h3>Menu</h3>
        <span data-toggle="offCanvas-responsive"><i class="fa fa-times"></i></span>
    </div>
    <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
        <li class="has-submenu">
            <a href="#"><i class="fa fa-home"></i>Home</a>
            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                <li><a href="{{route('index')}}"><i class="fa fa-home"></i>Home page v1</a></li>
            </ul>
        </li>
        <li class="has-submenu" data-dropdown-menu="example1">
            <a href="#"><i class="fa fa-film"></i>Videos</a>
            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                <li><a href="#"><i class="fa fa-film"></i>single video v1</a></li>
                <li><a href="#"><i class="fa fa-film"></i>submit post</a></li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-th"></i>category</a></li>
        <li>
            <a href="#"><i class="fa fa-edit"></i>blog</a>
            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                <li><a href="#"><i class="fa fa-edit"></i>blog single post</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-magic"></i>features</a>
            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                <li><a href="#"><i class="fa fa-magic"></i>404 Page</a></li>
                <li><a href="#"><i class="fa fa-magic"></i>Archives</a></li>
                <li><a href="{{route('login')}}"><i class="fa fa-magic"></i>login</a></li>
                <li><a href="{{route('password.request')}}"><i class="fa fa-magic"></i>Forgot Password</a></li>
                <li><a href="{{route('register')}}"><i class="fa fa-magic"></i>Register</a></li>
                <li>
                    <a href="#"><i class="fa fa-magic"></i>profile</a>
                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                        <li><a href="profile-page-v1.html"><i class="fa fa-magic"></i>profile v1</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-magic"></i>Author Page</a></li>
                <li><a href="#"><i class="fa fa-magic"></i>search results</a></li>
                <li><a href="#"><i class="fa fa-magic"></i>Terms &amp; Condition</a></li>
            </ul>
        </li>
        <li><a href="about-us.html"><i class="fa fa-user"></i>about</a></li>
        <li><a href="contact-us.html"><i class="fa fa-envelope"></i>contact</a></li>
    </ul>
    <div class="responsive-search">
        <form method="post">
            <div class="input-group">
                <input class="input-group-field" type="text" placeholder="search Here">
                <div class="input-group-button">
                    <button type="submit" name="search"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="off-social">
        <h6>Get Socialize</h6>
        <a href="{{$socials['facebook']}}"><i class="fa fa-facebook"></i></a>
        <a href="{{$socials['twitter']}}"><i class="fa fa-twitter"></i></a>
        <a href="{{$socials['google']}}"><i class="fa fa-google-plus"></i></a>
        <a href="{{$socials['instagram']}}"><i class="fa fa-instagram"></i></a>
        <a href="{{$socials['vimeo']}}"><i class="fa fa-vimeo"></i></a>
        <a href="{{$socials['youtube']}}"><i class="fa fa-youtube"></i></a>
    </div>
    <div class="top-button">
        <ul class="menu">
            <li>
                <a href="submit-post.html">upload Video</a>
            </li>
            <li class="dropdown-login">
                <a href="login.html">login/Register</a>
            </li>
        </ul>
    </div>
</div>