@php
// dd(resource_path('views/admin/icons'));

use App\Models\Partial;
use A17\Twill\Repositories\SettingRepository;

$header = Partial::where('title', 'Header')->first();
$footer = Partial::where('title', 'Footer')->first();
$body_insert_code = app(SettingRepository::class)->byKey('global_body_insert_code');
$head_insert_code = app(SettingRepository::class)->byKey('global_head_insert_code');

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.includes.meta.base', ['page_data' => $page_data ?? []])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('meta')
    <!-- INSERTED FROM BACKEND -->
    {!! $head_insert_code !!}
    <!-- END INSERTED FROM BACKEND -->

</head>

<body class="font-body text-canvas" data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="global">
        <div class="flex flex-col min-h-screen">
            <!--BEGIN_PAGE-->
            @if ($header)
            {!! $header->renderBlocks() !!}
            @endif
            @yield('content')
            @if ($footer)
            {!! $footer->renderBlocks() !!}
            @endif
            <!--END_PAGE-->
        </div>
    </main>
    @if (app('request')->input('dev'))
    @include('layouts.includes.overlay')
    @endif
    @if (!Str::contains(request()->url(), 'admin/'))
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none text-canvas shadow-box" style="z-index: 9999">
    </div>
    <div class="fixed left-0 items-center justify-center w-full h-full overflow-hidden pointer-events-none page-cover bg-canvas"
        style="z-index: 9999; clip: rect(0, auto, auto, 0);">
        <div class="bg-black fill-parent opacity-20"></div>
        <div class="fixed top-0 left-0 flex flex-col items-center justify-center w-full h-full icon-wrap">
            <div class="text-white" style="width: 3.5rem">
                {{-- @include('svg.logo_icon') --}}
            </div>
        </div>
    </div>
    @endif
    @if (isset($is_pagespeed))
    @if (!$is_pagespeed)
    <script src="{{ mix('js/app.js') }}"></script>
    @endif
    @else
    <script src="{{ mix('js/app.js') }}"></script>
    @endif
    @if (!request()->input('noscroll'))

    <style>
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
    <script src="https://unpkg.com/jarallax@2.0"></script>
    <script>
        jarallax(document.querySelectorAll('.jarallax'), {
            disableParallax: /iPad|iPhone|iPod|Android/,
            disableVideo: /iPad|iPhone|iPod|Android/
        });
    </script>
    @endif

    @stack('scripts')
    <!-- INSERTED FROM BACKEND -->
    {!! $body_insert_code !!}
    <!-- END INSERTED FROM BACKEND -->
    <div
        class="w-1/2 w-1/3 w-1/4 sm:w-1/2 sm:w-1/3 sm:w-1/4 md:w-1/2 md:w-1/3 md:w-1/4 lg:w-1/2 lg:w-1/3 lg:w-1/4 xl:w-1/2 xl:w-1/3 xl:w-1/4">
    </div>
</body>

</html>