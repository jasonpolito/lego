@php
use OzdemirBurak\Iris\Color\Hex;
use A17\Twill\Repositories\SettingRepository;
use App\Repositories\SystemRepository;
$system_repo = app(SystemRepository::class);
$setting_repo = app(SettingRepository::class);

$title_font = $setting_repo->byKey('font_title_g0j09sd09jdssd') ?? 'Inter';
$body_font = $setting_repo->byKey('font_body_g0j09sd09jdssd') ?? 'Inter';

// Google fonts
$fonts = config('styles.fonts');

// Build Google font url params
$font_family = '';
$i = 0;
foreach ($fonts as $type => $font) {
$family = str_replace(' ', '+', $font);
$font_family .= ($i > 0 ? '&family=' : '') .
"$family:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800";
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
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>


<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@foreach ($colors as $name => $hex)
<style>

</style>
@endforeach
<style>
    @include('layouts.includes.colors')

    /*  */
    ::selection {
        color: white;
        background-color: var(--color-primary);
    }

    /*  */
    html body {
        font-size: {
                {
                config('styles.base.font-size')
            }
        }

        ;
    }

    [class*=material-icons] {
        vertical-align: text-bottom;
    }

    @foreach ($fonts as $type=> $font)

    /* .font-{{ $type }} {
        font-family: "{{ $font }}";
    } */
    @endforeach .font-title {
        font-family: "{{ $title_font }}";
    }

    .font-body {
        font-family: "{{ $body_font }}";
    }

    .jarallax {
        position: relative;
        z-index: 0;
    }

    .jarallax>.jarallax-img {
        position: absolute;
        object-fit: cover;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
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