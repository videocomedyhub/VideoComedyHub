<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    @foreach ($videos as $v)
    <url>
        <loc>{{ route('videos.single', ['slug' => $v->slug]) }}</loc>
        <video:video>
            <video:thumbnail_loc>{{$v->thumbnail}}</video:thumbnail_loc>
            <video:title>{{$v->title}}</video:title>
            <video:description>{{$v->seo_description}}</video:description>
            <video:player_loc autoplay="ap=1"> {{config('youtube.embed') . $v->video_id}}</video:player_loc>
            <video:duration>{{$v->seconds}}</video:duration>
            <video:rating>4.2</video:rating>
            <video:view_count>{{$v->count}}</video:view_count>
            <video:publication_date>{{$v->atom_time}}</video:publication_date>
            <video:gallery_loc title="{{$v->channel->title}} Videos">{{route('channels.single', ['channelId' => $v->channel->channel_id])}}</video:gallery_loc>
            <video:requires_subscription>no</video:requires_subscription>
            <video:uploader info="{{route('channels.single', ['channelId' => $v->channel->channel_id])}}">{{$v->channel->title}}</video:uploader>
            <video:tag>{{ TextHelper::tagToList($v->tags)}}</video:tag>
        </video:video>
    </url>
    @endforeach
</urlset>