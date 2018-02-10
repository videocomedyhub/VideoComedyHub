@php
if (!function_exists('active_link')) {

  function active_link($route)
  {
		$action = Route::currentRouteName();
        return ( ( $action == $route) or (Request::is('*/'.$route.'/*')) ) ? 'active' : '';
  }
}
@endphp
<section id="navBar">
    <nav class="sticky-container" data-sticky-container>
        <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
            <div class="row">
                <div class="large-12 columns">
                    <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                        <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                        <div class="title-bar-title"><img src="{{asset('assets/images/logo-small.png')}}" alt="{{config('app.name')}}"></div>
                    </div>

                    <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                        <div class="top-bar-left">
                            <ul class="menu">
                                <li class="menu-text">
                                    <a href="{{route('index')}}"><img src="{{asset('assets/images/logo.png')}}" alt="{{config('app.name')}}"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="top-bar-right search-btn">
                            <ul class="menu">
                                <li class="search">
                                    <i class="fa fa-search"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="top-bar-right">
                            <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                <li class="{{active_link('index')}}">
                                    <a href="{{route('index')}}"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="{{active_link('channels')}}" data-dropdown-menu="example1">
                                    <a href="{{route('channels')}}"><i class="fa fa-film"></i>Channel</a>
                                </li>
                                <li class="{{active_link('categories')}}"><a href="{{route('categories')}}"><i class="fa fa-th"></i>Category</a></li>
                                <li class="{{active_link('posts')}}"><a href="{{route('blogs')}}"><i class="fa fa-edit"></i>Post</a></li>
                                <li class="{{active_link('pages')}}"><a href="#"><i class="fa fa-magic"></i>Pages</a></li>
                                <li class="{{active_link('about-us')}}"><a href="{{route('about-us')}}"><i class="fa fa-user"></i>About</a></li>
                                <li class="{{active_link('contact-us')}}"><a href="{{route('contact-us')}}"><i class="fa fa-envelope"></i>Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="search-bar" class="clearfix search-bar-light">
                <form method="get" action="{{ route('search') }}">
                    {{-- csrf_field() --}}
                    <div class="search-input float-left">
                        <input type="search" name="q" placeholder="Seach Here your comedy">
                    </div>
                    <div class="search-btn float-right text-right">
                        <button class="button" type="submit">Search Now</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</section>
