<head prefix="og: http://ogp.me/ns# video: http://ogp.me/ns/video#">
    <meta charset="utf-8">
    <title>{{$video->title}}</title>

    <!-- for Facebook -->          
    <meta property="fb:app_id" content="{{config('facebook.app_id')}}">
    <meta property="og:title" content="{{$video->title}}">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta property="og:type" content="video.movie">
    <meta property="video:duration" content="{{$video->duration_seconds}}">
    <meta property="video:release_date" content="{{$video->atom_time}}">
    <meta property="og:image" content="{{$video->thumbnail}}">
    <meta property="og:url" content="{{route('videos.single',['slug' => $video->slug])}}">
    <meta property="og:description" content="{{ str_limit($video->seo_description, 200) }}">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$video->title}}">
    <meta name="twitter:description" content="{{ str_limit($video->seo_description, 200) }}">
    <meta name="twitter:image" content="{{$video->thumbnail}}">
    <link rel="canonical" href="{{route('videos.single',['slug' => $video->slug])}}">

    <meta name="description" content="{{ str_limit($video->seo_description, 200) }}">
    <!-- for Google (video) -->
    <meta name="keywords" content=" {{TextHelper::tagToList($vidTags)}}">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{$video->title}}">
    <meta itemprop="description" content="{{ str_limit($video->seo_description, 200) }}">
    <meta itemprop="image" content="{{$video->thumbnail}}">