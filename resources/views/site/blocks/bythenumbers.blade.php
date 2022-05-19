@php
$theme_name = env('THEME_NAME');
$cols = $block->children;
$img = fallback_img($block->image('flexible', 'flexible'));
// $preview_cols = [
// ["10+",
// "Years of experience",
// "Called a fly, behold seasons meat which stars bring fruit.",],
// ["328",
// "Successful projects",
// "You every can't thing seed subdue subdue light female.",],
// ["68%",
// "Cost savings",
// "Image isn't that give appear made us you're yielding.",],
// ["1k",
// "Email leads generated",
// "Fruit deep first cattle set fourth without and day subdue.",]
// ];
@endphp
@if (View::exists("themes.$theme_name.bythenumbers"))
@include("themes.$theme_name.bythenumbers", ['block' => $block])
@else
<x-section class="text-white bg-primary">
    <div class="fill-parent mix-blend-multiply">
        <div class="w-full h-full">
            <img src="{{ $img }}" class="object-cover w-full h-full opacity-25 filter grayscale">
        </div>
    </div>
    <x-container>
        <x-cols class="lg:-my-12">
            @foreach ($block->children as $col)
            <x-col class="my-6 sm:w-1/2 lg:w-1/4">
                <x-title el="h6">
                    <span class="block text-5xl">{{ $col->input('amount') }}</span>
                    {{ $col->input('title') }}
                </x-title>
                <div class="-mt-2 text-sm leading-6 mix-blend-screen opacity-80 md:-mt-6">{{ $col->input('text') }}
                </div>
            </x-col>
            @endforeach
        </x-cols>
    </x-container>
</x-section>
@endif