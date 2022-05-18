@php
$rand_title = array_rand(array_flip(config('cms.placeholders')), 1);
@endphp
<x-title display="{{ $block->input('title_display_element') ?? 'h2' }}"
    el="{{ $block->input('title_element') ?? 'h3' }}">
    {!! $block->input('title_text') !!}
</x-title>