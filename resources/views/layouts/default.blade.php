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
            <div>{!! $header->renderBlocks() !!}

                @if (auth('twill_users')->user())
                <div class="absolute bottom-0 right-0 p-6">
                    <a href="/admin/partials/{{ $header->id }}/edit"
                        style="z-index: 999; border: solid 1px rgba(255,255,255,.5)" target="_blank"
                        class="flex flex-col items-center justify-center w-12 h-12 text-white transition bg-black rounded-full opacity-50 hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                </div>
                @endif
            </div>
            @endif
            @yield('content')
            @if ($footer)
            <div>{!! $footer->renderBlocks() !!}

                @if (auth('twill_users')->user())
                <div class="absolute top-0 right-0 p-6">
                    <a href="/admin/partials/{{ $footer->id }}/edit"
                        style="z-index: 999; border: solid 1px rgba(255,255,255,.5)" target="_blank"
                        class="flex flex-col items-center justify-center w-12 h-12 text-white transition bg-black rounded-full opacity-50 hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
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
    <script src="{{ mix('js/app.js') }}"></script>

    <livewire:scripts />

    @stack('scripts')
    <!-- INSERTED FROM BACKEND -->
    {!! $body_insert_code !!}
    <!-- END INSERTED FROM BACKEND -->
    <div
        class="w-1/2 w-1/3 w-1/4 sm:w-1/2 sm:w-1/3 sm:w-1/4 md:w-1/2 md:w-1/3 md:w-1/4 lg:w-1/2 lg:w-1/3 lg:w-1/4 xl:w-1/2 xl:w-1/3 xl:w-1/4">
    </div>

    @if (auth('twill_users')->user() && isset($page))
    <div class="fixed bottom-0 right-0 p-6">
        <a href="/admin/pages/pages/{{ $page->id }}/edit" target="_blank"
            class="flex flex-col items-center justify-center w-12 h-12 text-white transition bg-black rounded-full opacity-50 hover:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </a>
    </div>
    @endif
</body>

</html>