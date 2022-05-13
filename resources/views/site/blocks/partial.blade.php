@php
use App\Models\Partial;
$partial = Partial::withTrashed()->find($block->input('partial'));
@endphp

@if ($partial && !$partial->trashed())
    {!! $partial->renderBlocks() !!}
@else
    <x-section class="text-red-800 bg-red-100">
        <x-container class="text-center">
            <x-title el="h5" class="font-mono">
                @if ($partial->trashed())
                    Restore partial "{{ $partial->title }}" to use.
                @else
                    Partial not found!
                @endif
            </x-title>
        </x-container>
    </x-section>
@endif
