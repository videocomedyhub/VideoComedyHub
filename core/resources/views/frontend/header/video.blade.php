<title>{{$video->title}}</title>
<meta name="description" content="{{ $video->seo_description }}">
<!-- for Google (video) -->
<meta name="keywords" content="{{ TextHelper::tagToList($tags)}}" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$video->title}}">
<meta itemprop="description" content="{{ $video->seo_description }}">
<meta itemprop="image" content="{{$video->thumbnail}}">

<!-- for Facebook -->          
<meta property="og:title" content="{{$video->title}}" />
<meta property="og:type" content="video.other" />
<meta property="og:image" content="{{$video->thumbnail}}" />
<meta property="og:url" content="{{route('videos.single',['slug' => $video->slug])}}" />
<meta property="og:description" content="{{ $video->seo_description }}" />

<!-- for Twitter -->          
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{$video->title}}" />
<meta name="twitter:description" content="{{ $video->seo_description }}" />
<meta name="twitter:image" content="{{$video->thumbnail}}" />
<link rel="canonical" href="{{route('videos.single',['slug' => $video->slug])}}" />