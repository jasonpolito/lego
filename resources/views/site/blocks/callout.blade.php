@php
$theme_name = env('THEME_NAME');
$rand_title = array_rand(array_flip(config('cms.placeholders')), 1);
$img = fallback_img($block->image('flexible', 'flexible'));

@endphp
@if (View::exists("themes.$theme_name.callout"))
@include("themes.$theme_name.callout", ['block' => $block])
@else
<x-section class="text-white text-{{ $block->input('align') }} callout">
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
                        {!! $block->input('content') !!}
                    </div>
                    @if ($block->input('btn_show'))
                    <a class="block px-6 py-4 text-center text-white rounded-md bg-primary sm:inline-block"
                        href="{{ $block->input('btn_url') }}" @if ($block->input('btn_external')) target="_blank"
                        @endif>
                        {!! $block->input('btn_text') !!}
                    </a>
                    @endif
                </x-col>
            </x-cols>
        </div>
    </x-container>
</x-section>
@endif