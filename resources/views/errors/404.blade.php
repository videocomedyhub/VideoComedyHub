@extends('layouts.app')

@section('content')
<!--breadcrumbs-->
<section id="breadcrumb" class="breadMargin">
    <div class="row">
        <div class="large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home"></i><a href="{{route('index')}}" title="{{config('app.name')}}">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> page not found
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section><!--end breadcrumbs-->
<section class="error-page">
    <div class="row secBg">
        <div class="large-8 large-centered columns">
            <div class="error-page-content text-center">
                <div class="error-img text-center">
                    <img src="{{asset('assets/images/404-error.png')}}" alt="404 page">
                    <div class="spark">
                        <img class="flash" src="{{asset('assets/images/spark.png')}}" alt="spark">
                    </div>
                </div>
                <h1>Page Not Found</h1>
                <p>{{$exception->getMessage()}}</p>
                <a href="{{route('index')}}" title="{{config('app.name')}}" class="button">Go Back To {{config('app.name')}} Home Page</a>
            </div>
        </div>
    </div>
</section>
@endsection