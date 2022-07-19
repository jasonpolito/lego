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
            class="flex items-center justify-center px-2 py-1 text-xs text-white transition bg-black rounded opacity-50 hover:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg> {{ $partial->title }}
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