<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <title>{{$channel->title}}</title>
    <!-- for Facebook -->          
    <meta property="og:title" content="{{$channel->title}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{route('index')}}">
    <meta property="og:image" content="{{str_replace('https','http',$channel->thumbnail)}}">
    <meta property="og:image:secure_url" content="{{$channel->thumbnail}}">
    <meta property="og:url" content="{{route('channels.single',['slug' => $channel->slug])}}">
    <meta property="og:description" content="{{ $channel->seo_description }}">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$channel->title}}">
    <meta name="twitter:description" content="{{ $channel->seo_description }}">
    <meta name="twitter:image" content="{{$channel->thumbnail}}">

    <meta name="description" content="{{ $channel->seo_description }}">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{$channel->title}}">
    <meta itemprop="description" content="{{ $channel->seo_description }}">
    <meta itemprop="image" content="{{$channel->thumbnail}}">

