<title>{{$category->title}}</title>
<meta name="description" content="{{ $category->seo_description }}">
<!-- for Google -->
<meta name="keywords" content="{{ TextHelper::tagToList($tags)}}" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{$category->title}}">
<meta itemprop="description" content="{{ $category->seo_description }}">
<meta itemprop="image" content="{{$category->image}}">

<!-- for Facebook -->          
<meta property="og:title" content="{{$category->title}}" />
<meta property="og:type" content="video.other" />
<meta property="og:image" content="{{$category->image}}" />
<meta property="og:url" content="{{route('categories.single',['slug' => $category->slug])}}" />
<meta property="og:description" content="{{ $category->seo_description }}" />

<!-- for Twitter -->          
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{$category->title}}" />
<meta name="twitter:description" content="{{ $category->seo_description }}" />
<meta name="twitter:image" content="{{$category->image}}" />
