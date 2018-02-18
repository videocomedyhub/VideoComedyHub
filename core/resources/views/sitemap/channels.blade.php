<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @for ($i = 1; $i <= $index; $i++)
    <sitemap>
        <loc>{{route('sitemap.channels.single', ['page' => $i])}}</loc>
    </sitemap>
    @endfor
</sitemapindex>