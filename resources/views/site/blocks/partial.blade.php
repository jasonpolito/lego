@php
use App\Models\Partial;
$partial = Partial::withTrashed()->find($block->input('partial'));
$id = $block->input('block_id') ?? uniqid();
@endphp

@if ($partial)
<div id="{{ $id }}">
    {!! $partial->renderBlocks() !!}
    @if (auth('twill_users')->user())
    <div class="absolute top-0 right-0 p-2">
        <a href="/admin/partials/{{ $partial->id }}/edit" style="z-index: 999; border: solid 1px rgba(255,255,255,.5)"
            target="_blank"
            class="flex flex-col items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
            Edit Partial
        </a>
    </div>
    @endif
</div>
@else
<x-section class="text-red-800 bg-red-100">
    <x-container class="text-center">
        <div class="text-center" style="font-family: monospace">Select a partial.</div>
    </x-container>
</x-section>
@endif