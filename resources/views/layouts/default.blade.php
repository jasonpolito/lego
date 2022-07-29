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
    <!-- Alpine Plugins -->
    <script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('meta')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <!-- INSERTED FROM BACKEND -->
    {!! $head_insert_code !!}
    <!-- END INSERTED FROM BACKEND -->
    <livewire:styles />
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
            <div>{!! $footer->renderBlocks() !!}
                @if (auth('twill_users')->user())
                <div class="absolute top-0 right-0 p-2">
                    <a href="/admin/partials/{{ $footer->id }}/edit"
                        style="z-index: 999; border: solid 1px rgba(255,255,255,.5)" target="_blank"
                        class="flex items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg> {{ $footer->title }}
                    </a>
                </div>
                @endif
            </div>
            @endif
            <!--END_PAGE-->
        </div>
    </main>
    @if (app('request')->input('dev'))
    @include('layouts.includes.overlay')
    @endif
    <script src="{{ mix('js/app.js') }}"></script>

    <livewire:scripts />

    @stack('scripts')
    <!-- INSERTED FROM BACKEND -->
    {!! $body_insert_code !!}
    <!-- END INSERTED FROM BACKEND -->
    <div
        class="w-1/2 w-1/3 w-1/4 rounded-r-sm rounded-r-lg rounded-r-xl rounded-r-md rounded-r-2xl rounded-r-3xl sm:w-1/2 sm:w-1/3 sm:w-1/4 md:w-1/2 md:w-1/3 md:w-1/4 lg:w-1/2 lg:w-1/3 lg:w-1/4 xl:w-1/2 xl:w-1/3 xl:w-1/4">
    </div>
    <div
        class="w-1/2 w-1/3 w-1/4 rounded-t-sm rounded-t-lg rounded-t-xl rounded-t-md rounded-t-2xl rounded-t-3xl sm:w-1/2 sm:w-1/3 sm:w-1/4 md:w-1/2 md:w-1/3 md:w-1/4 lg:w-1/2 lg:w-1/3 lg:w-1/4 xl:w-1/2 xl:w-1/3 xl:w-1/4">
    </div>
    <div
        class="w-1/2 w-1/3 w-1/4 sm:rounded-r-sm sm:rounded-r-lg sm:rounded-r-xl sm:rounded-r-md sm:rounded-r-2xl sm:rounded-r-3xl sm:w-1/2 sm:w-1/3 sm:w-1/4 md:w-1/2 md:w-1/3 md:w-1/4 lg:w-1/2 lg:w-1/3 lg:w-1/4 xl:w-1/2 xl:w-1/3 xl:w-1/4">
    </div>

    @if (auth('twill_users')->user() && isset($page))
    <div class="fixed bottom-0 right-0 p-2">
        <a href="/admin/pages/pages/{{ $page->id }}/edit" target="_blank"
            class="flex items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg> Page
        </a>
    </div>
    @endif

    @stack('body_end')

</body>

</html>