@php
$theme_name = env('THEME_NAME');
$bg_img = fallback_img($block->image('flexible', 'flexible'));
@endphp
@if (View::exists("themes.$theme_name.hero"))
@include("themes.$theme_name.hero", ['block' => $block])
@else
<x-section data-jarallax data-speed="0.8"
    class="jarallax {{ $block->input('fullscreen') ? 'min-h-screen flex flex-col justify-center' : '' }} bg-cover bg-center text-white text-{{ $block->input('align') }}"
    style="background-image: url({{ $bg_img }})">
    <div class="rounded-md opacity-50 fill-parent bg-canvas"></div>
    <x-container>
        <x-cols class="justify-{{ $block->input('align') }} py-8">
            <x-col class="w-full lg:w-3/5">
                <div class="pt-8"></div>
                @include('site.blocks.defaults.title', ['block' => $block])
                @if (!empty($block->input('content')))
                <div class="content">
                    {!! $block->input('content') !!}
                </div>
                @endif
                <div class="sm:flex w-full justify-{{ $block->input('align') }}">
                    @include('site.blocks.defaults.buttons', ['buttons' => $block->children])
                </div>
            </x-col>
        </x-cols>
    </x-container>
</x-section>
@endif