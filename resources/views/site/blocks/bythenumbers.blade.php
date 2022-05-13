@php
$theme_name = env('THEME_NAME');
@endphp
@if (View::exists("themes.$theme_name.bythenumbers"))
@include("themes.$theme_name.bythenumbers", ['block' => $block])
@else
<x-section class="text-white bg-primary">
    <div class="fill-parent mix-blend-multiply">
        <div data-jarallax data-speed="0.9" class="w-full h-full jarallax">
            <img src="{{ $block->image('flexible', 'flexible') }}"
                class="object-cover w-full h-full opacity-25 jarallax-img filter grayscale">
        </div>
    </div>
    <x-container>
        <x-cols class="lg:-my-12">
            @foreach ($block->children as $col)
            <x-col class="my-6 md:w-1/2 lg:w-1/4">
                <x-title el="h6">
                    <span class="block text-5xl">{{ $col->input('amount') }}</span>
                    {{ $col->input('title') }}
                </x-title>
                <div class="-mt-2 text-sm leading-6 mix-blend-screen opacity-80 sm:-mt-6">{{ $col->input('text') }}
                </div>
            </x-col>
            @endforeach
        </x-cols>
    </x-container>
</x-section>
@endif