@php
use App\Http\Controllers\PageController;
$theme_name = env('THEME_NAME');
if ($block->input('use_main_image')) {
$post = get_post();
if ($post) {
$bg_img = !Str::contains($post->image('flexible', 'flexible'), 'data:image') ? $post->image('flexible', 'flexible') :
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
    <div @if (!empty($block->input('overlay_color')))
        style="background: {{ $block->input('overlay_color') }}"

        @endif
        class="
        opacity-{{ $block->input('overlay_opacity') ?? '50' }} fill-parent bg-canvas"></div>
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
                        @php
                        $content = PageController::parseTextContent($block->input('content'));
                        @endphp
                        {{-- <x-cols>
                        <x-col class="w-full lg:w-2/3"> --}}
                        <div class="content">
                            {!! $content !!}
                            <div></div>
                        </div>
                        {{-- </x-col>
                    </x-cols> --}}
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