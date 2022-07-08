@php
$rand_title = array_rand(array_flip(config('cms.placeholders')), 1);
@endphp
@if (method_exists($block, 'input'))
<x-title display="{{ $block->input('title_display_element') ?? 'h2' }}"
    el="{{ $block->input('title_element') ?? 'h3' }}">
    {!! $block->input('title_text') !!}
</x-title>

@else
<x-title display="h4" el="h3">
    {!! $block->title !!}
</x-title>
@endif