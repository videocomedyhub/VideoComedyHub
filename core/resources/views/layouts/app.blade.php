<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(isset($video))
            @include('frontend.header.video')
        @elseif(isset($channel))
            @include('frontend.header.channel')
        @elseif(isset($category))
            @include('frontend.header.category')
        @elseif(isset($page))
            @include('frontend.header.page')
        @elseif(isset($post))
            @include('frontend.header.post')
        @else
            @include('frontend.header.other')
        @endif
        
        
        @section('styles')
        <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/layerslider/css/layerslider.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/jquery.kyco.easyshare.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
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
        @section('scripts')
        <script src="{{asset('assets/bower_components/jquery/dist/jquery.js')}}"></script>
        <script src="{{asset('assets/bower_components/what-input/what-input.js')}}"></script>
        <script src="{{asset('assets/bower_components/foundation-sites/dist/foundation.js')}}"></script>
        <script src="{{asset('assets/js/jquery.showmore.src.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script src="{{asset('assets/layerslider/js/greensock.js')}}" type="text/javascript"></script>
        <!-- LayerSlider script files -->
        <script src="{{asset('assets/layerslider/js/layerslider.transitions.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layerslider/js/layerslider.kreaturamedia.jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/inewsticker.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/jquery.kyco.easyshare.js')}}" type="text/javascript"></script>
        @show
    </body>
</html>