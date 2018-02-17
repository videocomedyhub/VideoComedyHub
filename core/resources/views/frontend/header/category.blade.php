<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <title>{{$category->title}}</title>
    <!-- for Facebook -->          
    <meta property="og:title" content="{{$category->title}}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{str_replace('https','http',$category->image)}}">
    <meta property="og:image:secure_url" content="{{$category->image}}">
    <meta property="og:url" content="{{route('categories.single',['slug' => $category->slug])}}">
    <meta property="og:description" content="{{ $category->seo_description }}">

    <!-- for Twitter -->          
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{$category->title}}">
    <meta name="twitter:description" content="{{ $category->seo_description }}">
    <meta name="twitter:image" content="{{$category->image}}">
    <!-- for Google -->
    <meta name="keywords" content="{{ TextHelper::tagToList($tags)}}">

    <meta name="description" content="{{ $category->seo_description }}">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{$category->title}}">
    <meta itemprop="description" content="{{ $category->seo_description }}">
    <meta itemprop="image" content="{{$category->image}}">

