@php
$theme_name = env('THEME_NAME');
$id = $block->input('block_id') ?? uniqid();
@endphp
@if (View::exists("themes.$theme_name.html"))
@include("themes.$theme_name.html", ['block' => $block])
@else
@if (!empty($block->input('html_content')))
@if ($block->input('wrap_in_container'))
<x-section :block="$block">
    <x-container>
        @endif
        <div id="{{ $id }}">
            {!! $block->input('html_content') !!}
        </div>
        @if ($block->input('wrap_in_container'))
    </x-container>
</x-section>
@endif
@else
<x-section>
    <x-container>
        <div class="text-center" style="font-family: monospace">Enter HTML code.</div>
    </x-container>
</x-section>
@endif
@endif