<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($tags as $t)
        <url>
            <loc>{{ route('tags.single', ['slug' => $t->slug]) }}</loc>
            <lastmod>{{ $t->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.4</priority>
        </url>
    @endforeach
</urlset>