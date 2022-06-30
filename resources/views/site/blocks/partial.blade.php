@php
use App\Models\Partial;
$partial = Partial::withTrashed()->find($block->input('partial'));
$id = $block->input('block_id') ?? uniqid();
@endphp

@if ($partial)
<div id="{{ $id }}">{!! $partial->renderBlocks() !!}</div>
@else
<x-section class="text-red-800 bg-red-100">
    <x-container class="text-center">
        <div class="text-center" style="font-family: monospace">Select a partial.</div>
    </x-container>
</x-section>
@endif