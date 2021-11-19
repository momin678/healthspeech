<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($articals as $artical)
        <url>
            <loc>{{ url('/') }}/article/{{ $artical->hs_title }}</loc>
            <loc>{{ url('/') }}/article/{{ $artical->slug }}</loc>
            <lastmod>{{ $artical->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($topics as $topic)
        <url>
            <loc>{{ url('/') }}/topics/{{ $topic->health_topic_name }}</loc>
            <loc>{{ url('/') }}/topics/{{ $topic->slug }}</loc>
            <lastmod>{{ $topic->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    
</urlset>