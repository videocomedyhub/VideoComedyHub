<title>{{$channel->title}}</title>
<meta name="description" content="{{ $channel->seo_description }}">
<!-- for Google (channel)-->
<meta name="keywords" content="{{ TextHelper::tagToList($tags)}}" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$channel->title}}">
<meta itemprop="description" content="{{ $channel->seo_description }}">
<meta itemprop="image" content="{{$channel->thumbnail}}">

<!-- for Facebook -->          
<meta property="og:title" content="{{$channel->title}}" />
<meta property="og:type" content="video.other" />
<meta property="og:image" content="{{$channel->thumbnail}}" />
<meta property="og:url" content="{{route('channels.single',['slug' => $channel->slug])}}" />
<meta property="og:description" content="{{ $channel->seo_description }}" />

<!-- for Twitter -->          
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{$channel->title}}" />
<meta name="twitter:description" content="{{ $channel->seo_description }}" />
<meta name="twitter:image" content="{{$channel->thumbnail}}" />
