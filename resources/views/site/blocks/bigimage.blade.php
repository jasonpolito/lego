@php
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (has_img($block->image('flexible', 'flexible')))
<div id="{{ $id }}">
    <img src="{{ $block->image('flexible', 'flexible', ['fm' => null]) }}" alt="{{ $block->imageAltText('flexible') }}"
        class="w-full align-top">
</div>
@else
@if ($block->input('use_url') && !empty($block->image('url')))
<div id="{{ $id }}">
    <img src="{{ $block->input('url') }}" alt="" class="w-full align-top">
</div>
@else
<x-section class="text-red-800 bg-red-100">
    <x-container class="text-center">
        <div class="text-center" style="font-family: monospace">Select an image.</div>
    </x-container>
</x-section>
@endif
@endif