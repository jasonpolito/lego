@php
$url = env('APP_URL');
$sitemap_placeholder = <<<EOD
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>$url</loc>
    </url>
    ...
</urlset>
EOD;
$robots_placeholder = <<<EOD
User-agent: *
Disallow: /backend/
Sitemap: $url/sitemap.xml
EOD;
@endphp
@extends('twill::layouts.settings')

@section('contentFields')


    @formField('input', [
    'name' => 'robots_content',
    'type' => 'textarea',
    'label' => 'Robots.txt',
    'placeholder' => "$robots_placeholder"
    ])


    @formField('input', [
    'name' => 'sitemap_content',
    'type' => 'textarea',
    'label' => 'Sitemap.xml',
    'note' => 'Leave blank for automatic sitemap',
    'placeholder' => $sitemap_placeholder
    ])


@stop
