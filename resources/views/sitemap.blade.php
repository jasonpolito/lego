<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    @foreach ($pages as $page)
        <url>
            @if ($page->nestedSlug == 'homepage')
                <loc>{{ route('page.show', ['slug' => '']) }}</loc>
            @else
                <loc>{{ route('page.show', ['slug' => $page->nestedSlug]) }}</loc>
            @endif
        </url>
    @endforeach
</urlset>
