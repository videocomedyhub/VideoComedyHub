<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <title>{{$tag->name}}</title>
    <!-- for Facebook -->          
    <meta property="og:title" content="{{$tag->name}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{route('index')}}">
    <meta property="og:image" content="{{str_replace('https','http',$tag->thumbnail)}}">
    <meta property="og:image:secure_url" content="{{$tag->thumbnail}}">
    <meta property="og:url" content="{{route('tags.single',['slug' => $tag->slug])}}">
    <meta property="og:description" content="{{ $tag->seo_description }}">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$tag->name}}">
    <meta name="twitter:description" content="{{ $tag->seo_description }}">
    <meta name="twitter:image" content="{{$tag->thumbnail}}">

    <meta name="description" content="{{ $tag->seo_description }}">
    <!-- for Google (tag)-->
    <meta name="keywords" content="{{ $tag->name}}">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{$tag->name}}">
    <meta itemprop="description" content="{{ $tag->seo_description }}">
    <meta itemprop="image" content="{{$tag->thumbnail}}">