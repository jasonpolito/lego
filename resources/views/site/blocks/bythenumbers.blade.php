@php
use App\Http\Controllers\PageController;
$theme_name = env('THEME_NAME');
$img = fallback_img($block->image('flexible', 'flexible'));
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.bythenumbers"))
@include("themes.$theme_name.bythenumbers", ['block' => $block])
@else
<x-section class="text-white bg-primary" id="{{ $id }}">
    <div class="fill-parent mix-blend-multiply">
        <div class="w-full h-full">
            <img src="{{ $img }}" class="object-cover w-full h-full opacity-25 filter grayscale">
        </div>
    </div>
    <x-container>
        <x-cols class="justify-between lg:-my-12">
            @foreach ($block->children()->orderBy('position')->get() as $col)
            <x-col class="w-full my-6 sm:w-1/2 lg:w-1/4">
                <x-title el="h6">
                    <span class="block text-5xl">{{ $col->input('amount') }}</span>
                    {{ $col->input('title') }}
                </x-title>
                <div class="-mt-2 text-sm leading-6 mix-blend-screen opacity-80 md:-mt-6">
                    @if (Str::contains(request()->url(), 'admin/'))
                    {!! $col->input('text') !!}
                    @else
                    {!! Str::replace('mb-8', '', Str::replace('pl-8', 'pl-4',
                    PageController::parseTextContent($col->input('text')))) !!}
                    @endif
                </div>
            </x-col>
            @endforeach
        </x-cols>
    </x-container>
</x-section>
@endif