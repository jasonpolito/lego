@php
$theme_name = env('THEME_NAME');
$btn = count($block->children) ? $block->children[0] : false;
$img = fallback_img($block->image('flexible', 'flexible'));
@endphp
@if (View::exists("themes.$theme_name.actionbox"))
@include("themes.$theme_name.actionbox", ['block' => $block])
@else
<div>
    <x-container>
        <div class="p-12 overflow-hidden bg-primary {{ settings('rounded') }}">
            <div class="fill-parent mix-blend-multiply">
                <div class="w-full h-full jarallax" data-jarallax data-speed="0.8">
                    <img src="{{ $img }}" class="object-cover w-full h-full opacity-25 filter grayscale jarallax-img">
                </div>
            </div>
            <div class="flex flex-wrap items-center lg:flex-nowrap">
                <div class="w-full text-white">
                    @include('site.blocks.defaults.title')
                    <div class="-mt-6 leading-6">{!! $block->input('content') !!}</div>
                </div>
                @if ($btn)
                <div class="pt-8 lg:pt-0 whitespace-nowrap lg:pl-12">
                    <a href="{{ $btn->input('btn_url') }}"
                        class="block px-6 py-4 my-2 text-center bg-white rounded-md sm:inline-block">{{ $btn->input('btn_text') }}</a>
                </div>
                @endif
            </div>
        </div>
    </x-container>
</div>
@endif