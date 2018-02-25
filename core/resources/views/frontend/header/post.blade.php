<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <title>{{$post->title}}</title>
    <meta name="description" content="{{ $post->seo_description }}">
    <!-- for Google -->
    <meta name="keywords" content="{{ TextHelper::tagToList($tags)}}">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{$post->title}}">
    <meta itemprop="description" content="{{ $post->seo_description }}">
    <meta itemprop="image" content="{{$post->image}}">

    <!-- for Facebook -->          
    <meta property="fb:app_id" content="{{config('facebook.app_id')}}">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta property="og:title" content="{{$post->title}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{$post->image}}">
    <meta property="og:url" content="{{route('posts.single',['slug' => $post->slug])}}">
    <meta property="og:description" content="{{ $post->seo_description }}">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$post->title}}">
    <meta name="twitter:description" content="{{ $post->seo_description }}">
    <meta name="twitter:image" content="{{$post->image}}">
