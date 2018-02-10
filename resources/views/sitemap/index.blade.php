<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{route('sitemap.videos')}}</loc>
        <lastmod>{{ $video->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{route('sitemap.channels')}}</loc>
        <lastmod>{{ $video->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{route('sitemap.categories')}}</loc>
        <lastmod>{{ $video->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{route('sitemap.pages')}}</loc>
        <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{route('sitemap.posts')}}</loc>
        <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    <sitemap>
        <loc>{{route('sitemap.tags')}}</loc>
        <lastmod>{{ $video->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>