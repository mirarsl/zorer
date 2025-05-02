@php
    echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ date('Y-m-d') }}T{{date('H:i:s')}}+00:00</lastmod>
        <changefreq>Daily</changefreq>
        <priority>1.0</priority>
    </url>


    @foreach ($Page as $page)
        <url>
            <loc>{{ route('page', $page->fullSlug()) }}</loc>
            <lastmod>{{ date('Y-m-d') }}T{{date('H:i:s')}}+00:00</lastmod>
            <changefreq>Daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($Service as $service)
        <url>
            <loc>{{ route('product', $service->getTranslatedAttribute('slug')) }}</loc>
            <lastmod>{{ date('Y-m-d') }}T{{date('H:i:s')}}+00:00</lastmod>
            <changefreq>Daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach

    @foreach ($News as $news)
        <url>
            <loc>{{ route('news', $news->getTranslatedAttribute('slug')) }}</loc>
            <lastmod>{{ date('Y-m-d') }}T{{date('H:i:s')}}+00:00</lastmod>
            <changefreq>Daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach

</urlset>