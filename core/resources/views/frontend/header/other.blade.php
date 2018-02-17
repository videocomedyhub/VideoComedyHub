<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
<title>{{isset($title)? $title . ' - ' . config('app.name')  : config('app.name') }}</title>
<meta name="description" content="{{config('app.name')}}">
    <!-- for Facebook -->          
    <meta property="og:title" content="{{config('app.name')}}">
    <meta property="og:site_name" content="{{config('app.url')}}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{str_replace('https','http',asset('assets/images/videocomedyhub.jpg'))}}">
    <meta property="og:image:secure_url" content="{{asset('assets/images/videocomedyhub.jpg')}}">
    <meta property="og:url" content="{{route('index')}}">
    <meta property="og:description" content="Video comedy Hub">