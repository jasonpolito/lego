@php

use A17\Twill\Repositories\SettingRepository;

$title_font = app(SettingRepository::class)->byKey('font_title_g0j09sd09jdssd');
$body_font = app(SettingRepository::class)->byKey('font_body_g0j09sd09jdssd');

// Google fonts
$fonts = config('styles.fonts');

// Build Google font url params
$font_family = '';
$i = 0;
foreach ($fonts as $type => $font) {
    $family = str_replace(' ', '+', $font);
    $font_family .= ($i > 0 ? '&family=' : '') . "$family:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800";
    $i++;
}
$body_font_inc = str_replace(' ', '+', $body_font);
$font_family .= "&family=$body_font_inc:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800";
$title_font_inc = str_replace(' ', '+', $title_font);
$font_family .= "&family=$title_font_inc:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800";

$colors = [
    'primary' => app(SettingRepository::class)->byKey('main_color_sdgagasdag'),
    'canvas' => app(SettingRepository::class)->byKey('canvas_color_sdgagasdag'),
];
@endphp

@if (isset($is_pagespeed))
    @if (!$is_pagespeed)
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family={{ $font_family }}&display=swap" rel="stylesheet">
    @endif
@else
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family={{ $font_family }}&display=swap" rel="stylesheet">
@endif
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>


<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@foreach ($colors as $name => $hex)
    <style>

    </style>
@endforeach
<style>
    :root {
        --edge-color: rgb(230, 230, 230);
        --edge-weight: 1px;
        --edge-t: inset 0 var(--edge-weight) var(--edge-color);
        --edge-r: inset calc(var(--edge-weight) * -1) 0 var(--edge-color);
        --edge-b: inset 0 calc(var(--edge-weight) * -1) var(--edge-color);
        --edge-l: inset var(--edge-weight) 0 var(--edge-color);
        @foreach ($colors as $name => $hex)--color-{{ $name }}: {{ $hex }};
        @endforeach
    }

    ::selection {
        color: white;
        background-color: var(--color-primary);
    }

    @foreach ($colors as $name => $hex)

    /*  */
    .bg-{{ $name }} {
        background-color: var(--color-{{ $name }});
    }

    .text-{{ $name }} {
        color: var(--color-{{ $name }});
    }

    .hover\:bg-{{ $name }}:hover {
        background-color: var(--color-{{ $name }});
    }

    .hover\:text-{{ $name }}:hover {
        color: var(--color-{{ $name }});
    }

    .focus\:bg-{{ $name }}:focus {
        background-color: var(--color-{{ $name }});
    }

    .focus\:text-{{ $name }}:focus {
        color: var(--color-{{ $name }});
    }

    .group:hover .group-hover\:bg-{{ $name }} {
        background-color: var(--color-{{ $name }});
    }

    .group:hover .group-hover\:text-{{ $name }} {
        color: var(--color-{{ $name }});
    }

    .group:focus .group-focus\:bg-{{ $name }} {
        background-color: var(--color-{{ $name }});
    }

    .group:focus .group-focus\:text-{{ $name }} {
        color: var(--color-{{ $name }});
    }

    @endforeach

    /*  */
    html body {
        font-size: {{ config('styles.base.font-size') }};
    }

    [class*=material-icons] {
        vertical-align: text-bottom;
    }

    @foreach ($fonts as $type => $font)

    /* .font-{{ $type }} {
        font-family: "{{ $font }}";
    } */
    @endforeach.font-title {
        font-family: "{{ $title_font }}";
    }

    .font-body {
        font-family: "{{ $body_font }}";
    }

</style>


@if (!Str::contains(request()->url(), 'admin/'))
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        [data-aos=fade-up] {
            transform: translate3d(0, 1rem, 0);
        }

    </style>
@endif
@stack('styles')
