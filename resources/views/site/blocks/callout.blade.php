@php
use App\Http\Controllers\PageController;

$theme_name = env('THEME_NAME');
$rand_title = array_rand(array_flip(config('cms.placeholders')), 1);
$img = fallback_img($block->image('flexible', 'flexible'));
$content = PageController::parseTextContent($block->input('content'));
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.callout"))
@include("themes.$theme_name.callout", ['block' => $block])
@else
<x-section id="{{ $id }}" class="text-white text-{{ $block->input('align') }} callout">
    {{-- <div class="border-t opacity-50 fill-parent border-canvas-content"></div> --}}

    <x-container>
        <div class="px-5 py-12 bg-center bg-cover {{ settings('rounded') }} overflow-hidden bg-primary sm:px-16 sm:py-20 sm:-mx-8 lg:-mx-0 lg:px-20 md:py-32 xl:px-32"
            style="background-image: url({{ $img }})">
            <div class="fill-parent">
                <div data-jarallax data-speed="0.9" class="w-full h-full jarallax">
                    <img src="{{ $img }}" class="object-cover w-full h-full jarallax-img">
                </div>
            </div>
            <div class="{{ settings('rounded') }} opacity-50 fill-parent bg-canvas"></div>
            <x-cols class="justify-{{ $block->input('align') }}">
                <x-col class="w-full lg:w-3/4">
                    <x-title display="{{ $block->input('title_display_element') ?? 'h1' }}"
                        el="{{ $block->input('title_element') ?? 'h3' }}">
                        {{--  --}}
                        {!! $block->input('title_text') ?? $rand_title !!}
                    </x-title>
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