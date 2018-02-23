<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">

    @if(isset($video))
    @include('frontend.header.video')
    @elseif(isset($channel))
    @include('frontend.header.channel')
    @elseif(isset($tag))
    @include('frontend.header.tag')
    @elseif(isset($category))
    @include('frontend.header.category')
    @elseif(isset($page))
    @include('frontend.header.page')
    @elseif(isset($post))
    @include('frontend.header.post')
    @else
    @include('frontend.header.other')
    @endif
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">     
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/layerslider/css/layerslider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.kyco.easyshare.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    @section('styles')
    @show
    @section('stuctured')
    @show
</head>
<body>
    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
            <!--header-->
            @include('frontend.commons.offcanvasmenu')
            <div class="off-canvas-content" data-off-canvas-content>

                @include('frontend.sections.header')
                <!-- End Header -->

                <!-- Content Start -->
                @yield('content')
                <!-- Content End -->

                <!-- footer -->
                @include('frontend.sections.footer')
                <!-- footer -->
            </div><!--end off canvas content-->
        </div><!--end off canvas wrapper inner-->
    </div><!--end off canvas wrapper-->
    <!-- script files -->
    <script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/foundation-sites/dist/foundation.min.js')}}"></script>
    <script defer src="{{asset('assets/bower_components/what-input/what-input.min.js')}}"></script>
    <script defer src="{{asset('assets/js/min/jquery.showmore.src-min.js')}}" type="text/javascript"></script>
    <script async src="{{asset('assets/js/min/app-min.js')}}"></script>
    <!-- LayerSlider script files
    <script src="{{asset('assets/layerslider/js/greensock.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layerslider/js/layerslider.transitions.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layerslider/js/layerslider.kreaturamedia.jquery.js')}}" type="text/javascript"></script>  -->
    <script defer src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script defer src="{{asset('assets/js/inewsticker.js')}}" type="text/javascript"></script>
    <script defer src="{{asset('assets/js/min/jquery.kyco.easyshare-min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
jQuery(document).ready(function (jQuery) {
    jQuery('.ld').each(function () {
        var imagex = jQuery(this);
        var imgOriginal = imagex.data('original');
        jQuery(imagex).attr('src', imgOriginal);
    });
});
    </script>
    @section('scripts')
    @show
</body>
</html>