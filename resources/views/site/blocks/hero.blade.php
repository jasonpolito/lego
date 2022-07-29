@php
use App\Http\Controllers\PageController;
use A17\Twill\Repositories\SettingRepository;

$primary_color = app(SettingRepository::class)->byKey('main_color_sdgagasdag');

$theme_name = env('THEME_NAME');
$page = get_post();
$content = PageController::parseTextContent($block->input('content'));
if ($block->input('use_main_image')) {
if ($page) {
$bg_img = !Str::contains($page->image('flexible', 'flexible'), 'data:image') ? $page->image('flexible', 'flexible') :
false;
} else {
$bg_img = !Str::contains($block->image('flexible', 'flexible'), 'data:image') ? $block->image('flexible',
'flexible') : false;
}
} else {
$bg_img = !Str::contains($block->image('flexible', 'flexible'), 'data:image') ? $block->image('flexible',
'flexible') : false;
}
// $bg_img = $post_img ?? $block_img;
// ddd($block_img);
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.hero"))
@include("themes.$theme_name.hero", ['block' => $block])
@else
@if ($block->input('variant') == 'default' || empty($block->input('variant')))
<x-section id="{{ $id }}" :reduced-padding="$block->input('reduced_padding')"
    class="{{ $block->input('fullscreen') ? 'md:min-h-screen flex flex-col justify-center' : '' }} bg-cover bg-center text-white text-{{ $block->input('align') }}">
    <div class="bg-center bg-cover fill-parent bg-gradient-to-br from-primary-500 to-primary-700"
        style="background-image: url({{ $bg_img }})">
    </div>
    @if ($block->input('video_background') || $block->file('bg_video'))
    <div class="transition duration-1000 opacity-0 fill-parent" id="video_bg_{{ $id }}">
        <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" class="jarallax" data-jarallax
            data-speed="0.5">
            <video playsinline autoplay muted loop style="width: 100%; height: 100%; object-fit: cover"
                class="jarallax-img">
                <source src="{{ $block->file('bg_video') }}" type="video/mp4">
            </video>
        </div>
        <script>
            setTimeout(() => {
                document.querySelector('#video_bg_{{ $id }}').classList.remove('opacity-0')
            }, 250);
        </script>
    </div>
    @endif
    @if ($bg_img || $block->input('video_background') || $block->file('bg_video'))
    <div @if (!empty($block->input('overlay_color')) || $page)
        style="background: {{ $block->input('overlay_color') ?? $page->page_color }}"

        @endif
        class="
        opacity-{{ $block->input('overlay_opacity') ?? '50' }} fill-parent bg-gradient-to-br from-primary-700
        to-primary-900"></div>
    @else
    <div class="fill-parent bg-gradient-to-br from-primary-500 to-primary-700"></div>
    @endif
    <div>
        <x-container :container="$block->input('full_width_container')">
            @if ($block->input('is_narrow'))
            <div class="-my-8 md:-my-20">
                @endif
                <x-cols class="justify-{{ $block->input('align') }} py-8">
                    <x-col class="w-full xl:w-3/5">
                        <div class="pt-8"></div>
                        @if ($block->input('title_text') == 'Water/Ways Exhibition')
                        <div class="flex items-center">
                            <div><img src="{{ asset('img/smithsonian.png') }}" style="width: 15rem" class="mb-10"></div>
                            <div class="pl-4" style="padding-top: 12px"><img
                                    src="{{ asset('img/waterways-logo.webp') }}" style="width: 12rem" class="mb-10">
                            </div>
                        </div>
                        @endif
                        @include('site.blocks.defaults.title', ['block' => $block])
                        @if (!empty($block->input('content')))
                        <div class="content">
                            {!! $content !!}
                            <div></div>
                        </div>
                        @endif
                        <div class="sm:flex w-full justify-{{ $block->input('align') }}">
                            @include('site.blocks.defaults.buttons', ['buttons' => $block->children])
                        </div>
                    </x-col>
                </x-cols>
                @if ($block->input('is_narrow'))
            </div>
            @endif
        </x-container>
    </div>
</x-section>
@endif
@if ($block->input('variant') == 'contained')

<x-section id="{{ $id }}" class="text-white text-{{ $block->input('align') }} callout">
    <x-container>
        <div class="px-5 py-12 bg-center bg-cover {{ settings('rounded') }} overflow-hidden bg-primary sm:px-16 sm:py-20 sm:-mx-8 lg:-mx-0 lg:px-20 md:py-32 xl:px-32"
            style="background-image: url({{ $bg_img }})">
            <div class="fill-parent">
                <div data-jarallax data-speed="0.9" class="w-full h-full jarallax">
                    <img src="{{ $bg_img }}" class="object-cover w-full h-full jarallax-img">
                </div>
            </div>

            @if ($bg_img || $block->input('video_background') || $block->file('bg_video'))
            <div @if (!empty($block->input('overlay_color')) || $page)
                style="background: {{ $block->input('overlay_color') ?? $page->page_color }}"

                @endif
                class="
                opacity-{{ $block->input('overlay_opacity') ?? '50' }} fill-parent bg-gradient-to-br from-primary-700
                to-primary-900"></div>
            @else
            <div class="fill-parent bg-gradient-to-br from-primary-500 to-primary-700"></div>
            @endif
            <x-cols class="justify-{{ $block->input('align') }}">
                <x-col class="w-full lg:w-3/4">
                    @include('site.blocks.defaults.title', ['block' => $block])
                    <div class="mb-8 leading-6 sm:leading-8">
                        {!! $content !!}
                    </div>
                    <div class="sm:flex w-full -mb-4 justify-{{ $block->input('align') }}">
                        @include('site.blocks.defaults.buttons', ['buttons' => $block->children])
                    </div>
                </x-col>
            </x-cols>
        </div>
    </x-container>
</x-section>
@endif

@if ($block->input('variant') == 'thin')

<div id="{{ $id }}" class="py-16 actionbox">
    <x-container>
        <div class="px-5 pb-8 pt-10 sm:p-12 overflow-hidden bg-primary {{ settings('rounded') }}">

            @if ($bg_img || $block->input('video_background') || $block->file('bg_video'))
            <div class="fill-parent"
                style="background: {{ $block->input('overlay_color') ?? $page->page_color ?? $primary_color }}">
            </div>
            <div class="fill-parent mix-blend-multiply">
                <div class="w-full h-full jarallax" data-jarallax data-speed="0.8">
                    <img src="{{ $bg_img }}" alt="Dream Skin Lasers"
                        class="object-cover w-full h-full opacity-25 filter grayscale jarallax-img">
                </div>
            </div>
            @else

            <div class="fill-parent mix-blend-multiply">
                <div class="w-full h-full jarallax" data-jarallax data-speed="0.8">
                    <img src="{{ $bg_img }}" alt="Dream Skin Lasers"
                        class="object-cover w-full h-full opacity-25 filter grayscale jarallax-img">
                </div>
            </div>
            @endif
            <div class="flex flex-wrap items-center lg:flex-nowrap">
                <div class="w-full text-white">
                    @include('site.blocks.defaults.title')
                    <div class="leading-6 md:-mt-6 xl:w-3/4">{!! $content !!}</div>
                </div>
                @if ($block->children->count())
                <div class="w-full pt-8 lg:pt-0 whitespace-nowrap lg:pl-12 sm:w-auto">
                    @include('site.blocks.defaults.buttons', ['buttons' => $block->children])
                </div>
                @endif
            </div>
        </div>
    </x-container>
</div>

@endif

@endif