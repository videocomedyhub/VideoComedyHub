<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($channels as $c)
        <url>
            <loc>{{ route('channels.single', ['slug' => $c->slug]) }}</loc>
            <lastmod>{{ $c->atom_time }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>