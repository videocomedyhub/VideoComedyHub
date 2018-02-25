<head prefix="og: http://ogp.me/ns# video: http://ogp.me/ns/video#">
    <meta charset="utf-8">
    <title>{{$video->title}}</title>

    <!-- for Facebook -->          
    <meta property="og:title" content="{{$video->title}}">
    <meta property="og:site_name" content="{{route('index')}}">
    <meta property="og:type" content="video.movie">
    <meta property="og:image" content="{{$video->thumbnail}}">
    <meta property="og:url" content="{{route('videos.single',['slug' => $video->slug])}}">
    <meta property="og:description" content="{{ $video->seo_description }}">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$video->title}}">
    <meta name="twitter:description" content="{{ $video->seo_description }}">
    <meta name="twitter:image" content="{{$video->thumbnail}}">
    <link rel="canonical" href="{{route('videos.single',['slug' => $video->slug])}}">

    <meta name="description" content="{{ $video->seo_description }}">
    <!-- for Google (video) -->
    <meta name="keywords" content=" {{TextHelper::tagToList($vidTags)}}">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{$video->title}}">
    <meta itemprop="description" content="{{ $video->seo_description }}">
    <meta itemprop="image" content="{{$video->thumbnail}}">