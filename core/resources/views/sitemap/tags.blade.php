<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @for ($i = 1; $i <= $index; $i++)
    <sitemap>
        <loc>{{route('sitemap.tags.single', ['page' => $i])}}</loc>
    </sitemap>
    @endfor
</urlset>