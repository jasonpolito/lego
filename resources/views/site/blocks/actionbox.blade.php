@php
$theme_name = env('THEME_NAME');
$btns = get_block_children($block->children, 'button');
$btn = $btns->count() ? $btns->first() : false;
$img = fallback_img($block->image('flexible', 'flexible'));
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.actionbox"))
@include("themes.$theme_name.actionbox", ['block' => $block])
@else
<div id="{{ $id }}" class="actionbox {{ $block->input('divide_sections') ? '-mb-32 z-10 -translate-y-1/2' : 'py-16' }}">
    <x-container>
        <div class="px-5 pb-8 pt-10 sm:p-12 overflow-hidden bg-primary {{ settings('rounded') }}">
            <div class="fill-parent mix-blend-multiply">
                <div class="w-full h-full jarallax" data-jarallax data-speed="0.8">
                    <img src="{{ $img }}" alt="Dream Skin Lasers"
                        class="object-cover w-full h-full opacity-25 filter grayscale jarallax-img">
                </div>
            </div>
            <div class="flex flex-wrap items-center lg:flex-nowrap">
                <div class="w-full text-white">
                    @include('site.blocks.defaults.title')
                    <div class="leading-6 md:-mt-6 xl:w-3/4">{!! $block->input('content') !!}</div>
                </div>
                @if ($btn)
                <div class="w-full pt-8 lg:pt-0 whitespace-nowrap lg:pl-12 sm:w-auto">
                    @include('site.blocks.defaults.buttons', ['buttons' => $block->children])
                    {{-- 
                    <a href="{{ $btn->input('btn_url') }}"
                    class="block w-full px-6 py-4 my-2 text-center bg-white rounded-md sm:w-auto sm:inline-block">{{ $btn->input('btn_text') }}</a> --}}
                </div>
                @endif
            </div>
        </div>
    </x-container>
</div>
@endif