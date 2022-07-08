@php
use App\Models\Partial;
$partial = Partial::withTrashed()->find($block->input('partial'));
$id = $block->input('block_id') ?? uniqid();
@endphp

@if ($partial)
<div id="{{ $id }}">
    {!! $partial->renderBlocks() !!}

    @if (auth('twill_users')->user())
    <div class="absolute bottom-0 right-0 p-6">
        <a href="/admin/partials/{{ $partial->id }}/edit" style="z-index: 999; border: solid 1px rgba(255,255,255,.5)"
            target="_blank"
            class="flex flex-col items-center justify-center w-12 h-12 text-white transition bg-black rounded-full opacity-50 hover:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
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